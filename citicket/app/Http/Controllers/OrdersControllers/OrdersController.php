<?php

namespace App\Http\Controllers\OrdersControllers;

require_once 'php/jdf.php';

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Film;
use App\Models\User;
use App\Models\Order;
use App\Models\Cinema;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;

use function PHPUnit\Framework\isNull;

class OrdersController extends Controller
{
    private $orders;
    
    function __construct()
    {
        $this->orders = Order::all();
    }
    public function initialization($name)
    {
        return view($name, [
            'orders' => $this->orders,
        ]);
    }
    public function ordersAdmin()
    {
        return $this->initialization('orders/orders_admin');
    }
    public function ordersUser(Order $cinema)
    {
        $b_i = scandir('storage/best_images');
        return view('orders/buy_ticket', [
            'data' => $cinema,
            'b_i' => $b_i,
            'date_registered' => jdate('y/m/d'),
            'day_registered' => jdate('l'),
            'time_registered' => jdate('g:i:s'),
        ]);
    }
    public function buyTicket($film_id)
    {
        session()->put('film_id', $film_id); // NBW
        $data = Film::where("id", "=", $film_id)->get(); // NBW
        $comment = Comment::where('film_id', '=', $film_id)->get(); // NBW
        $comment_reverse = $comment->reverse();
        $informationId = json_decode($data[0]->film_of_ids);
        foreach ($informationId as $id => $value) {
            $cinemaAr[] = (int) $value;
        }
        $result = Cinema::select('*')->whereIn('id', $cinemaAr)->get();
        return view("orders/buy_ticket", [
            'data' => $data,
            'comments' => $comment,
            'comments_r' => $comment_reverse,
            'cinemas' => $result,
        ]);
    }
    public function registerAnOrder($cinema_id)
    {
        $userId = Auth::user()->id;
        $filmId = session('film_id'); // NBW
        session()->put('cinema_id', $cinema_id);
        $memberRowInfo = Auth::user();
        $filmRowInfo = Film::where('id', '=', $filmId)->get(); // NBW
        Order::create([ // NBW
            'who_ordered_id' => $memberRowInfo->id,
            'who_ordered_name' => $memberRowInfo->name,
            'time_of_film' => $filmRowInfo[0]->running_time,
            'order_name' => $filmRowInfo[0]->film_name,
            'film_id' => $filmRowInfo[0]->id,
            'date_created' => jdate('y/m/d'),
            'day_created' => jdate('l'),
            'time_created' => jdate('g:i:s'),
        ]);
        return redirect('create-ticket/' . $cinema_id);
    }
    public function createATicket($cinema_id)
    {
        $film_id = session('film_id');
        $user_id = Auth::user()->id; // NBW
        $filmInfo = Film::where('id', '=', $film_id)->get(); // NBW
        $orderInfo = Order::where('film_id', '=', $film_id)->where('who_ordered_id', '=', $user_id)->get();
        $salonLoop = json_decode($filmInfo[0]->salon);
        $dayLoop = json_decode($filmInfo[0]->day);
        $timeLoop = json_decode($filmInfo[0]->time);
        foreach ($salonLoop as $id => $value) {
            if ($id == $cinema_id) {
                $salon = $value;
            }
        }
        if (!is_null($dayLoop)) {
            foreach ($dayLoop as $id => $value) {
                if ($id == $cinema_id) {
                    $day = $value;
                }
            }
        } else {
            $day = "ندارد";
        }
        if (!is_null($timeLoop)) {
            foreach ($timeLoop as $id => $value) {
                if ($id == $cinema_id) {
                    $time = $value;
                }
            }
        } else {
            $time = "ندارد";
        }
        $cinemaInfo = Cinema::where('id', '=', $cinema_id)->get();
        $html = view('orders\take_ticket', [
            "order" => $orderInfo,
            "cinema" => $cinemaInfo,
            "salon" => $salon,
            "day" => $day,
            "time" => $time,
        ]);
        return view('orders\take_ticket', [
            "order" => $orderInfo,
            "cinema" => $cinemaInfo,
            "salon" => $salon,
            "day" => $day,
            "time" => $time,
        ]);
    }
    public function deleteTheOrder(Order $order)
    {
        $order->delete();
        return redirect("orders-admin");
    }
}

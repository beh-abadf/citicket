<?php

namespace App\Http\Controllers;

require_once 'php/jdf.php';

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Film;
use App\Models\User;
use App\Models\Order;
use App\Models\Place;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade\Pdf as Pdf;

use function PHPUnit\Framework\isNull;

class OrdersController extends Controller
{
    private $orders;
    function __construct()
    {
        $this->orders = Order::all();
    }

    public function FirstConfiguration($name)
    {
        return view($name, [
            'orders' => $this->orders,
        ]);
    }

    public function OrdersAdmin()
    {
        return $this->FirstConfiguration('orders/orders_admin');
    }

    public function OrdersUser($id)
    {
        $tableData = Film::where('id', '=', $id)->get();
        $b_i = scandir('storage/best_images');
        return view('orders/buy_bill', [
            'data' => $tableData,
            'b_i' => $b_i,
            'date_registered' => jdate('y/m/d'),
            'day_registered' => jdate('l'),
            'time_registered' => jdate('g:i:s'),
        ]);
    }

    public function BuyBill($film_id)
    {

        session()->put('film_id', $film_id); // NBW
        $data = Film::where("id", "=", $film_id)->get(); // NBW
        $comment = Comment::where('film_id', '=', $film_id)->get(); // NBW
        $comment_reverse = $comment->reverse();
        $informationId = json_decode($data[0]->film_of_ids);
        foreach ($informationId as $id => $value) {
            $placeAr[] = (int) $value;
        }
        $result = Place::select('*')->whereIn('id', $placeAr)->get();
        return view("orders/buy_bill", [
            'data' => $data,
            'ifr_link' => $data[0]->film_iframe,
            'comments' => $comment,
            'comments_r' => $comment_reverse,
            'places' => $result,
        ]);
    }

    public function RegisterAnOrder($place_id)
    {
        $userId = Auth::user()->id;
        $filmId = session('film_id'); // NBW
        session()->put('place_id', $place_id);
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
        return redirect('export-pdf/' . $place_id);
    }

    public function CreatePdfFile($place_id)
    {
        $film_id = session('film_id');
        $user_id = Auth::user()->id; // NBW
        $filmInfo = Film::where('id', '=', $film_id)->get(); // NBW
        $orderInfo = Order::where('film_id', '=', $film_id)->where('who_ordered_id', '=', $user_id)->get();
        $salonLoop = json_decode($filmInfo[0]->salon);
        $dayLoop = json_decode($filmInfo[0]->day);
        $timeLoop = json_decode($filmInfo[0]->time);
        foreach ($salonLoop as $id => $value) {
            if ($id == $place_id) {
                $salon = $value;
            }
        }
        //if (!isNull()) {
            foreach ($dayLoop as $id => $value) {
                if ($id == $place_id) {
                    $day = $value;
                }
            }
       // } else {
       //     $day = "ندارد";
      //  }
       // if (!isNull()) {
            foreach ($timeLoop as $id => $value) {
                if ($id == $place_id) {
                    $time = $value;
                }
            }
       // } else {
      //      $time = "ندارد";
      //  }
        $placeInfo = Place::where('id', '=', $place_id)->get();
        return view('orders/take_bill', [
            "order" => $orderInfo,
            "place" => $placeInfo,
            "salon" => $salon,
            "day" => $day,
            "time" => $time,
        ]);
    }

    // public function GeneratePdf(Request $input_request)
    // {
    //     $html = view('orders/take_bill')->render();
    //     $pdf = Pdf::loadHTML($html);
    //     return $pdf->download('Bill');
    // }

    public function DeleteTheOrder($id)
    {
        $rowHasBeenSelected = Order::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenSelected->delete();
            return redirect("orders-admin");
        }
        return redirect('error');
    }
}

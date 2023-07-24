<?php

namespace App\Http\Controllers;

require_once 'php/jdf.php';

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Comment;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UIController extends Controller
{
    private $cities;
    private $places_and_city;
    function __construct()
    {
        $this->cities = City::all();
        $this->places_and_city = new City();
    }
    public function FirstConfiguration($name)
    {
        return view($name, [
            'cities' => $this->cities,
        ]);
    }

    public function AddAComment(Request $input_request)
    {
        $film_id = session('film_id');
        $user_name = $input_request['name'];
        $body = $input_request['comment'];
        Comment::create([
            'user_name' => $user_name,
            'body' =>  $body,
            'film_id' => $film_id,
            'date_created' => jdate('y/m/d'),
            'day_created' => jdate('l'),
            'time_created' => jdate('g:i:s')
        ]);       
        $response['data'] = Comment::where('film_id', '=', $film_id)->get();  
        return json_encode($response);
    }
    public function BestImages(Request $input_file)
    {
        $this->validate(
            $input_file,
            [
                'file1' => 'required|max:4000',
                'file2' => 'required|max:4000',
                'file3' => 'required|max:4000',
                'file4' => 'required|max:4000',
                'file5' => 'required|max:4000',
            ],
        );
        try {
            $items = scandir('storage\best_images\\');
            foreach ($items as $item) {
                Storage::disk('public')->delete('best_images\\' . $item);
            }
            Storage::disk('public')->put('best_images', $input_file['file1']);
            Storage::disk('public')->put('best_images', $input_file['file2']);
            Storage::disk('public')->put('best_images', $input_file['file3']);
            Storage::disk('public')->put('best_images', $input_file['file4']);
            Storage::disk('public')->put('best_images', $input_file['file5']);
            return back()->with('mess', '.اطلاعات ثبت شد');
        } catch (Exception $e) {
            return redirect('error');
        }
    }
}

<?php

namespace App\Http\Controllers\UIsControllers;

require_once 'php/jdf.php';

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Comment;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class UIsController extends Controller
{
    private $cities;
    private $cinemas_and_city;
    const BEST_IMAGES_PATH = 'public\\best_images\\';
    function __construct()
    {
        $this->cities = City::all();
        $this->cinemas_and_city = new City();
    }
    private function prepareData(Request $input_request): array
    {
        $film_id = session('film_id');
        $user_name = $input_request['name'];
        $body = $input_request['comment'];
        return [
            'user_name' => $input_request['name'],
            'body' => $body,
            'film_id' => $film_id,
            'date_created' => jdate('y/m/d'),
            'day_created' => jdate('l'),
            'time_created' => jdate('g:i:s')
        ]
        ;
    }
    public function initialization($name)
    {
        return view($name, [
            'cities' => $this->cities,
        ]);
    }

    public function addAComment(Request $input_request)
    {
        $film_id = session('film_id');
        $user_name = $input_request['name'];
        $body = $input_request['comment'];
        Comment::create([
            'user_name' => $input_request['name'],
            'body' => $body,
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
                'file1' => 'required|max:15000',
                'file2' => 'required|max:15000',
                'file3' => 'required|max:15000',
                'file4' => 'required|max:15000',
                'file5' => 'required|max:15000',
            ],
        );
        $items = scandir('storage\best_images\\');
        foreach ($items as $item) {
            Storage::delete(self::BEST_IMAGES_PATH . $item);
        }
        Storage::put(self::BEST_IMAGES_PATH, $input_file['file1']);
        Storage::put(self::BEST_IMAGES_PATH, $input_file['file2']);
        Storage::put(self::BEST_IMAGES_PATH, $input_file['file3']);
        Storage::put(self::BEST_IMAGES_PATH, $input_file['file4']);
        Storage::put(self::BEST_IMAGES_PATH, $input_file['file5']);
        return back()->with('mess', " اطلاعات ثبت شد. " );
    }
}

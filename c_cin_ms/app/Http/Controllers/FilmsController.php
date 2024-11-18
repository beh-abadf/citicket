<?php

namespace App\Http\Controllers;

require_once 'php/jdf.php';
require_once 'php/convert_to_persian.php';


use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Film;
use App\Models\Place;
use App\Models\Province;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Auth;

use function PHPUnit\Framework\isNull;

class FilmsController extends Controller
{
    private $provinces;
    private $data;
    private $places;
    function __construct()
    {
        $this->provinces = Province::all();
        $this->data = Film::all();
        $this->places = Place::all();
    }
    public function Validate_(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:2|max:50',
                'duration' => 'required',
                'director' => 'required|max:50',
                'ex_producer' => 'required|max:50',
                'about' => 'required|max:1000',
                'cny' => 'required|max:50',
                'language' => 'required|max:50',
                'price' => 'required|numeric',
                'ifr' => 'required',
                'file_' => 'required',
            ]
        );
    }
    public function FirstConfiguration($name)
    {
        return view($name, [
            'data' => $this->data,
            'places' => $this->places,
        ]);
    }
    public function FilmsAdmin()
    {
        return $this->FirstConfiguration('films/films_admin');
    }
    public function InitialValuesForTheFilmAddition()
    {
        return $this->FirstConfiguration('films/add_a_film');
    }
    public function ShowList()
    {
        $tableData = $this->data;
        $rows = 0;
        $box_numbers = 0;
        $count = $tableData->count();
        $total_data = $count;
        if ($count <= 4) {
            $box_numbers = $count;
        } else {
            $rows = (int) ($count / 4);
            $count = $count % 4;
            $box_numbers = $count;
        }
        $b_i = scandir('storage\best_images');
        return view('films/films_user', [
            'data' => $tableData,
            'data_index' => $total_data,
            'b_i' => $b_i,
            'rows' => $rows,
            'box_numbers' => $box_numbers,
        ]);
    }
    public function AddAFilm(Request $input_request)
    {
        $this->Validate_($input_request);

        $selectedcheckBox = $input_request["check"];
        $day = $input_request["day"];
        $time = $input_request["time"];
        $salon = $input_request["salon"];
        $place_ids = $input_request["place_id"];
        $file = $input_request->file('file_');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public\films_images\\', $fileName);
        $film_of_idsAr = [];
        $salonAr = [];
        $dayAr = [];
        $timeAr = [];
        foreach ($selectedcheckBox as $id => $value) {
            $film_of_idsAr += [$id => $place_ids[$id]];
            $salonAr += [$id => $salon[$id]];
            $dayAr += [$id => $day[$id]];
            $timeAr += [$id => $time[$id]];
        }
        Film::create([
            'image_name' => $fileName,
            'film_name' => $input_request['name'],
            'running_time' => convert_nums_persian($input_request['duration']),
            'director_name' => $input_request['director'],
            'ex_producer' => $input_request['ex_producer'],
            'country' => $input_request['cny'],
            'language' => $input_request['language'],
            'price_of_film' => convert_nums_persian($input_request['price']),
            'film_iframe' => str_replace('"', '', $input_request['ifr']),
            'film_of_ids' => json_encode($film_of_idsAr),
            'salon' => json_encode($salonAr),
            'day' => json_encode($dayAr),
            'time' => json_encode($timeAr),
            'more_about' => $input_request['about'],
            'date_created' => jdate('y/m/d'),
            'day_created' => jdate('l'),
            'time_created' => jdate('g:i:s')
        ]);
        return redirect('films-admin');
    }
    public function InitialValuesForTheFilmEdition($id)
    {
        $rowHasBeenSelected = Film::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->first();
            return view('films/edit_the_film', [
                'row' => $rowHasBeenGotten,
                'places' => $this->places,
                'provinces' => $this->provinces,
            ]);
        }
        return redirect('error');
    }
    public function UpdateTheFilmInformation(Request $input_request, $id)
    {
        $input_request->validate(
            [
                'file_' => 'required',
            ]
        );
        $file_ = $input_request['file_']->getClientOriginalName();
        Film::where('id', '=', $id)
            ->update([
                'film_name' => $input_request['name'],
                'running_time' => $input_request['duration'],
                'director_name' => $input_request['director'],
                'ex_producer' => $input_request['ex_producer'],
                'country' => $input_request['cny'],
                'language' => $input_request['language'],
                'price_of_film' => $input_request['price'],
                'day' => $input_request['day'],
                'time' => $input_request['time'],
                'more_about' => $input_request['about'],
                'film_iframe' => str_replace('"', '', $input_request['ifr']),
                'image_name' => $file_,
                'date_updated' => jdate('y/m/d'),
                'day_updated' => jdate('l'),
                'time_updated' => jdate('g:i:s'),
            ]);
        if ($file_ !== null) {
            $file = $input_request->file('file_');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public\films_images\\', $fileName);
        }
        return redirect('films-admin');
    }
    public function DeleteAFilm($id)
    {
        $rowHasBeenSelected = Film::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->get();
            File::delete('storage\film_images\\' . $rowHasBeenGotten[0]->image_name);
            $rowHasBeenSelected->delete();
            return redirect('films-admin');
        }
        return redirect('error');
    }
}

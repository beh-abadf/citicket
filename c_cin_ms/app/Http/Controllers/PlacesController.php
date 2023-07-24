<?php

namespace App\Http\Controllers;

require_once 'php/jdf.php';

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Place;
use App\Models\Province;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PlacesController extends Controller
{
    private $provinces;
    private $cities;
    private $places;
    function __construct()
    {
        $this->provinces = Province::all();
        $this->cities = City::all();
        $this->places = Place::all();
    }
    public function Validate_(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'city' => 'required',
                'address' => 'required|max:300',
                'capacity' => 'required|max:10',
            ]
        );
    }
    public function FirstConfiguration($name)
    {
        return view($name, [
            'provinces' => $this->provinces,
            'cities' => $this->cities,
            'places' => $this->places,
        ]);
    }
    public function InitCities($id = 0)
    {
        if ($id == 0) {
            $cities = $this->cities;
        } else {
            $cities = City::where('city_of_id', '=', $id)
                ->get();
        }
        $cities_array['city_data'] = $cities;
        return json_encode($cities_array);
    }
    public function PlacesAdmin()
    {
        return $this->FirstConfiguration('places/places_admin');
    }
    public function AddAPlaceFirstInit()
    {
        return $this->FirstConfiguration('places/add_a_place');
    }
    public function AddAPlace(Request $input_request)
    {
        $this->Validate_($input_request);
        $fileName = '';
        $file_exists = $input_request['image_file'];
        if ($file_exists !== null) {
            $file = $input_request->file('image_file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public\places_images', $fileName);
        }

        Place::create([
            'place_name' => $input_request['name'],
            'address' => $input_request['address'],
            'google_map_iframe' => $input_request['map'],
            'capacity' => $input_request['capacity'],
            'city_of_id' => $input_request['province'],
            'place_of_id' => $input_request['city'],
            'place_image_name' => $fileName,
            // 'who_created' => Auth::user()->id,
            'date_created' => jdate('y/m/d'),
            'day_created' => jdate('l'),
            'time_created' => jdate('g:i:s')
        ]);
        return redirect('placesadmin');
    }
    public function EditAPlace($id)
    {
        $rowHasBeenSelected = Place::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->first();
            return view('places/edit_a_place', [
                'place' => $rowHasBeenGotten,
                'provinces' => $this->provinces,
                'cities' => $this->cities,
            ]);
        }
        return redirect('error');
    }
    public function UpdateThePlaceInformation(Request $input_request, $id)
    {
        $this->Validate_($input_request);
        $file_exists = $input_request['image_file'];
        $information = Place::where('id', '=',  $id);
        if ($file_exists != null) {
            $file = $input_request->file('image_file');
            $fileName = $file->getClientOriginalName();
            $information_gotten = $information->first();
            File::delete('storage\places_images\\' . $information_gotten->place_image_name);
            $file->storeAs('public\places_images', $fileName);
            $information->update(["place_image_name" => $fileName]);
        }
        $information
            ->update([
                'place_name' => $input_request['name'],
                'address' => $input_request['address'],
                'capacity' => $input_request['capacity'],
                'google_map_iframe' => $input_request['map'],
                'city_of_id' => $input_request["province"],
                'place_of_id' => $input_request['city'],
                // 'who_updated' => Auth::user()->id,
                'date_updated' => jdate('y/m/d'),
                'day_updated' => jdate('l'),
                'time_updated' => jdate('g:i:s')
            ]);
        return redirect('placesadmin');
    }
    public function DeleteAPlace($id)
    {
        $rowHasBeenSelected = Place::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->get();
            File::delete('storage\place_images\\' . $rowHasBeenGotten[0]->place_image_name);
            $rowHasBeenSelected->delete();
            return redirect()->back();
        }
        return  redirect('error');
    }
}

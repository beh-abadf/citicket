<?php

namespace App\Http\Controllers\CinemasControllers;

require_once 'php/jdf.php';
require_once 'php/convert_to_persian.php';

use App\Http\Controllers\Commons\CommonFunctionsHandler;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesControllers\FilesController;
use App\Models\City;
use App\Models\Cinema;
use App\Models\Province;
use App\Http\Controllers\Services\CrudService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CinemasController extends Controller
{
    use FilesController;
    use CommonFunctionsHandler;


    private $provinces;
    private $cities;
    private $cinemas;
    private $fileName = [];
    private $crudService;

    const CINEMAS_IMAGES_FOLDER_PATH = 'public\\cinemas_images\\';
    function __construct(CrudService $crudService, Cinema $cienma)
    {
        $this->provinces = Province::all();
        $this->cities = City::all();//::with('province')->where('id', '=',1)->get();
        $this->cinemas = Cinema::all();
        $this->crudService = $crudService;
    }
    private function validateRequest(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'city' => 'required',
                'address' => 'required|max:300',
                'capacity' => 'required|max:10',
                'cinema_image' => 'required|max:15000'
            ]
        );
    }
    private function prepareData(Request $input_request): array
    {
        return [
            'cinema_name' => $input_request['name'],
            'address' => $input_request['address'],
            'google_map_iframe' => $input_request['map'],
            'capacity' => convert_nums_persian($input_request['capacity']),
            'province_id' => $input_request['province'],
            'city_id' => $input_request['city'],
            'cinema_image_name' => $this->fileName[0],
        ];
    }
    public function initialization($name)
    {
        return view($name, [
            'provinces' => $this->provinces,
            'cities' => $this->cities,
            'cinemas' => $this->cinemas,
        ]);
    }
    public function dropdownValuesForCities($id = null)
    {
        if ($id == 0) {
            $cities = $this->cities;
        } else {
            $cities = City::where('province_id', '=', $id)
                ->get();
        }
        $cities_array['city_data'] = $cities;
        return json_encode($cities_array);
    }
    public function cinemasAdmin()
    {
        return $this->initialization('cinemas/cinemas_admin');
    }
    public function initializeInputsForTheCinemaAddition()
    {
        return $this->initialization('cinemas/add_a_cinema');
    }
    public function addACinema(Request $input_request, Cinema $cinema)
    {
        $tempVar = $input_request;

        $this->validateRequest($input_request);

        $this->fileName[0] = $this->storeFiles($tempVar->file('cinema_image'), self::CINEMAS_IMAGES_FOLDER_PATH);

        $this->crudService->createAnItem(($this->prepareData($tempVar) + $this->configureDateOfCreation()), $cinema);

        return redirect('cinemas-admin');
    }
    public function initializeInputsForTheCinemaEdition(Cinema $cinema)
    {
        $provinces = Province::all();
        
        $cities = City::all();

        return view('cinemas/edit_a_cinema', [
            'cinema' => $cinema,
            'provinces' => $provinces,
            'cities' => $cities,
        ]);
    }
    public function updateTheCinemaInformation(Request $input_request, Cinema $cinema)
    {

        $tempVar = $input_request;

        $this->validateRequest($tempVar);

        if ($tempVar['cinema_image'] !== null) {
            $this->fileName[0] = $this->updateStoredFiles($tempVar->file('cinema_image'), self::CINEMAS_IMAGES_FOLDER_PATH, $cinema->cinema_image_name);
        }

        $this->crudService->updateAnItem(($this->prepareData($tempVar) + $this->configureDateOfUpdate()), $cinema);

        return redirect('cinemas-admin');
    }
    public function deleteACinema(Cinema $cinema)
    {
        Storage::delete(self::CINEMAS_IMAGES_FOLDER_PATH . $cinema->cinema_image_name);
        $cinema->delete();
        return redirect()->back();
    }
}

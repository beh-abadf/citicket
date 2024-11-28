<?php

namespace App\Http\Controllers\FilmsControllers;

require_once 'php/jdf.php';
require_once 'php/convert_to_persian.php';

use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesControllers\FilesController;
use App\Http\Controllers\Commons\CommonFunctionsHandler;
use App\Models\City;
use App\Models\Film;
use App\Models\Cinema;
use App\Models\Province;
use App\Rules\AtLeastOneCheckboxRequired;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Auth;
use App\Http\Controllers\Services\CrudService;

use function PHPUnit\Framework\isNull;

class FilmsController extends Controller
{
    use FilesController;
    use CommonFunctionsHandler;


    private $provinces;
    private $data;
    private $cinemas;
    private $fileName = [];
    private $crudService;
    const FILMS_POSTERS_FOLDER_PATH = 'public\\films_posters\\';
    const FILMS_TEASERS_FOLDER_PATH = 'public\\films_teasers\\';
    function __construct(CrudService $crudService)
    {
        $this->provinces = Province::all();
        $this->data = Film::all()->reverse();
        $this->cinemas = Cinema::all();
        $this->crudService = $crudService;
    }
    private function validateRequest(Request $request)
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
                'film_poster' => 'required|max:15000',
                'check' => ['required', new AtLeastOneCheckboxRequired()],
            ]
        );
    }
    private function prepareData(Request $input_request): array
    {
        //Gets all rows of cinemas table
        $checked = $input_request["check"];
         $cinema_ids = $input_request["cinema_id"];
        $salon = $input_request["salon"];
        $day = $input_request["day"]; 
        $time = $input_request["time"];
       
        $film_of_idsAr = [];
        $salonAr = [];
        $dayAr = [];
        $timeAr = [];

        //Flls arrays with checked rows of cinemas table
        foreach ($checked as $id => $value) {
            $film_of_idsAr += [$id => $cinema_ids[$id]];
            $salonAr += [$id => $salon[$id]];
            $dayAr += [$id => $day[$id]];
            $timeAr += [$id => $time[$id]];
        }

        return [
            'film_name' => $input_request['name'],
            'running_time' => convert_nums_persian($input_request['duration']),
            'director_name' => $input_request['director'],
            'ex_producer' => $input_request['ex_producer'],
            'country' => $input_request['cny'],
            'language' => $input_request['language'],
            'film_of_ids' => json_encode($film_of_idsAr),
            'salon' => json_encode($salonAr),
            'day' => json_encode($dayAr),
            'time' => json_encode($timeAr),
            'more_about' => $input_request['about'],
            'film_poster_name' => $this->fileName[0],
            'film_teaser_name' => $this->fileName[1],
        ];
    }
    public function initialization($name)
    {
        return view($name, [
            'data' => $this->data,
            'cinemas' => $this->cinemas,
        ]);
    }
    public function filmsAdmin()
    {
        return $this->initialization('films.films_admin');
    }
    public function initializeInputsForTheFilmAddition()
    {
        return $this->initialization('films.add_a_film');
    }
    public function filmsUser()
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
        return view('films.films_user', [
            'data' => $tableData,
            'data_index' => $total_data,
            'b_i' => $b_i,
            'rows' => $rows,
            'box_numbers' => $box_numbers,
        ]);
    }
    public function addAFilm(Request $input_request, Film $film)
    {
        $tempVar = $input_request;

        $this->validateRequest($tempVar);

        $this->fileName[0] = $this->storeFiles($tempVar->file('film_poster'), self::FILMS_POSTERS_FOLDER_PATH);

        $this->fileName[1] = $this->storeFiles($tempVar->file('film_teaser'), self::FILMS_TEASERS_FOLDER_PATH);

        $this->crudService->createAnItem(($this->prepareData($tempVar) + $this->configureDateOfCreation()), $film);

        return redirect('films-admin');
    }
    public function initializeInputsForTheFilmEdition(Film $film)
    {
        return view('films.edit_the_film', [
            'row' => $film,
            'cinemas' => $this->cinemas,
            'provinces' => $this->provinces,
        ]);
    }
    public function updateTheFilmInformation(Request $input_request, Film $film)
    {
        $tempVar = $input_request;

        $this->validateRequest($tempVar);

        if ($tempVar['film_poster'] !== null) {
            $this->fileName[0] = $this->updateStoredFiles($tempVar->file('film_poster'), self::FILMS_POSTERS_FOLDER_PATH, $film->film_poster_name);
        }

        if ($tempVar['film_teaser'] !== null) {
            $this->fileName[1] = $this->updateStoredFiles($tempVar->file('film_teaser'), self::FILMS_TEASERS_FOLDER_PATH, $film->film_teaser_name);
        }

        $this->crudService->updateAnItem(($this->prepareData($tempVar) + $this->configureDateOfUpdate()), $film);

        return redirect('films-admin');
    }
    public function deleteAFilm(Film $film)
    {
        Storage::delete(self::FILMS_POSTERS_FOLDER_PATH . $film->film_poster_name);
        Storage::delete(self::FILMS_TEASERS_FOLDER_PATH . $film->film_teaser_name);
        $film->delete();
        return redirect('films-admin');
    }
}
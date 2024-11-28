<?php

namespace App\Http\Controllers\NewsControllers;

require_once 'php/jdf.php';
require_once 'php/convert_to_persian.php';

use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesControllers\FilesController;
use App\Http\Controllers\Commons\CommonFunctionsHandler;
use App\Models\News;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Services\CrudService;

class NewsController extends Controller
{
    use FilesController;
    use CommonFunctionsHandler;

    private $news;
    private $fileName = [];
    private $crudService;
    const NEWS_IMAGES_FOLDER_PATH = 'public\\news_images\\';

    public function __construct(CrudService $crudService)
    {
        $this->news = News::all()->reverse();
        $this->crudService = $crudService;
    }
    private function validateRequest(Request $request)
    {
        $request->validate(
            [
                'news_image' => 'required|max:15000',
                'news' => 'required|max:300'
            ]
        );
    }
    private function prepareData(Request $input_request): array
    {
        $tempVar = trim(strip_tags($input_request['news']));//Remove special characters like  <>
        $newsData = [
            'news' => convert_nums_persian($tempVar),
            'news_image_name' => $this->fileName[0],
        ];
        return $newsData;
    }
    public function initialization($name)//Sends data to {name} view
    {
        return view($name, [
            'news' => $this->news
        ]);
    }
    public function newsUser()
    {
        $tableData = $this->news;
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
        return view('news.news_user', [
            'data' => $tableData,
            'data_index' => $total_data,
            'rows' => $rows,
            'box_numbers' => $box_numbers,
        ]);
    }
    public function newsAdmin()
    {
        return $this->initialization("news.news_admin");
    }
    public function addNews(Request $input_request, News $news)
    {
        $tempVar = $input_request;

        $this->validateRequest($tempVar);

        $this->fileName[0] = $this->storeFiles($tempVar->file('news_image'), self::NEWS_IMAGES_FOLDER_PATH);

        $this->crudService->createAnItem(($this->prepareData($tempVar) + $this->configureDateOfCreation()), $news);

        return redirect('news-admin');
    }
    public function initializeInputsForNewsEdition(News $news)
    {
        return view('news.edit_news', [
            'news' => $news,
        ]);
    }
    public function updateNewsInformation(Request $input_request, News $news)
    {
        $tempVar = $input_request;

        $this->validateRequest($tempVar);

        if ($tempVar['news_image'] !== null) {
            $this->fileName[0] = $this->updateStoredFiles(($tempVar->file('news_image')), self::NEWS_IMAGES_FOLDER_PATH, $news->news_image_name);
        }

        $this->crudService->updateAnItem(($this->prepareData($tempVar) + $this->configureDateOfUpdate()), $news);

        return redirect('news-admin');
    }
    public function deleteNews(News $news)
    {
        Storage::delete(self::NEWS_IMAGES_FOLDER_PATH . $news->news_image_name);
        $news->delete();
        return redirect('news-admin');
    }
}

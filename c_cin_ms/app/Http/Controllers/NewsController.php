<?php

namespace App\Http\Controllers;

require_once 'php/jdf.php';
require_once 'php/convert_to_persian.php';

use App\Http\Controllers\Controller;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    private $news;
    function __construct()
    {
        $this->news = News::all();
    }
    public function Validate_(Request $request)
    {
        $request->validate(
            [
                'file_' => 'required',
                'news' => 'required|max:300'
            ]
        );
    }
    public function FirstConfiguration($name)
    {
        return view($name, [
            'news' => $this->news
        ]);
    }
    public function NewsUser()
    {
        $tableData = News::all();
        $rows = 0;
        $box_numbers = 0;
        $count = $tableData->count();
        $total_data = $count;
        if ($count <= 3) {
            $box_numbers = $count;
        } else {
            $rows = (int) ($count / 3);
            $count = $count % 3;
            $box_numbers = $count;
        }
        return view('news\\news_user', [
            'data' => $tableData,
            'data_index' => $total_data,
            'rows' => $rows,
            'box_numbers' => $box_numbers,
        ]);
    }
    public function NewsAdmin()
    {
        return $this->FirstConfiguration("news\\news_admin");
    }
    public function AddNews(Request $input_request)
    {
        $this->Validate_($input_request);

        $file_exists = $input_request['file_'];
        if ($file_exists !== null) {
            $file = $input_request->file('file_');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public\news_images\\', $fileName);
        }
        $tempVar = trim(strip_tags($input_request['news']));
        News::create([
            'news' => convert_nums_persian($tempVar),
            'news_images' => $fileName,
            'date_created' => jdate('y/m/d'),
            'day_created' => jdate('l'),
            'time_created' => jdate('g:i:s')
        ]);
        return redirect('news-admin');
    }
    public function EditNews($id)
    {
        $rowHasBeenSelected = News::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->first();
            return view('news\\edit_news', [
                'news' => $rowHasBeenGotten,
            ]);
        }
        return redirect('error');
    }
    public function UpdateNews(Request $input_request, $id)
    {
        $this->Validate_($input_request);

        $information = News::where('id', '=', $id);
        $file_exists = $input_request['file_'];
        if ($file_exists !== null) {

            $file = $input_request->file('file_');
            $fileName = $file->getClientOriginalName();
            $information_gotten = $information->get();
            File::delete('storage\news_images\\' . $information_gotten[0]->news_images);
            $file->storeAs('public\news_images\\', $fileName);
            $information
                ->update([
                    'news_images' => $fileName,
                ]);
        }
        $tempVar = trim(strip_tags($input_request['news']));
        $information
            ->update([
                'news' => convert_nums_persian($tempVar),
                'date_updated' => jdate('y/m/d'),
                'day_updated' => jdate('l'),
                'time_updated' => jdate('g:i:s')
            ]);
        return redirect('news-admin');

    }
    public function DeleteNews($id)
    {
        $rowHasBeenSelected = News::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->first();
            File::delete('storage\news_images\\' . $rowHasBeenGotten->news_images);
            $rowHasBeenSelected->delete();
            return redirect('news-admin');
        }
        return redirect('error');
    }
}

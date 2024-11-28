<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

 class CommonPropertiesAndFunctions
{
    public function validateInputs(Request $request)
    {
        $request->validate(
            [
                'news_image' => 'required',
                'file1' => 'required|max:4000',
                'file2' => 'required|max:4000',
                'file3' => 'required|max:4000',
                'file4' => 'required|max:4000',
                'file5' => 'required|max:4000',
                'news' => 'required|max:300'
            ]
        );
    }
}

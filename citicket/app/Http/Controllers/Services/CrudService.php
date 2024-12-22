<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;

class CrudService extends Controller
{
    public function createAnItem(array $data, $objectSample)
    {
        $objectSample->create($data);
    }
    public function readSelectedData()
    {
        
    }
    public function updateAnItem(array $data, $objectSample)
    {
        $objectSample->update($data);
    }
    public function deleteAnItem($item)
    {

    }
}

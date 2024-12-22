<?php

namespace App\Http\Controllers\FilesControllers;


use Illuminate\Support\Facades\Storage;

trait FilesController
{
    private function storeFiles($file, string $path): string
    {
        $fileName = $file->getClientOriginalName();
        $file->storeAs($path, $fileName);
        return $fileName;
    }
    private function updateStoredFiles($file, string $folderPath, string $old_file_name): string
    {
        $fileName = $file->getClientOriginalName();
        Storage::delete($folderPath . $old_file_name);//Deletes last file
        $file->storeAs($folderPath, $fileName);//Adds new selected one
        return $fileName;
    }
}


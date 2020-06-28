<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class FileSaveService
{

    public function save(UploadedFile $file, string $directory): string
    {
        $path = $file->store("public/$directory");
        $path = "/storage" . substr($path, strlen("public"));
        return $path;
    }
}

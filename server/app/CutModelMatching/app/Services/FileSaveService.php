<?php

use Illuminate\Http\UplodedFile;

class FileSaveService {

    public function save(UplodedFile $file, string $directory): string {
        $path = $file->store("public/$directory");
        $path = "storage" . substr($path, strlen("public"));
        return $path;
    }
}

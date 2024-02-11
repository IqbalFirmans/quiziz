<?php

namespace App\Contracts\Store;

interface UpdateWithFileInterface{
    public function update_withFile($id, $data);
    public function destroy_file($path);
    public function store_file($file, $path, $option);
}



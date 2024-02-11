<?php

namespace App\Contracts\Store;

interface StoreWithFileInterface{
    public function store($data);
    public function destroy_file($path);
    public function store_file($path, $option);
}



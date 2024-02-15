<?php

namespace App\Repositories\Quiz\Question;

use App\Contracts\Basic\StoreInterface;
use App\Models\options_questions;

class StoreOptionRepository implements StoreInterface
{
    public function __construct()
    {
        //
    }
    public function store($data)
    {
        return options_questions::create($data);
    }
}

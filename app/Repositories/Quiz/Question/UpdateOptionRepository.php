<?php

namespace App\Repositories\Quiz\Question;

use App\Contracts\Basic\UpdateInterface;
use App\Models\options_questions;

class UpdateOptionRepository implements UpdateInterface
{
    public function __construct()
    {
        //
    }
    public function update($id, $data)
    {
        $model = options_questions::findOrFail($id);
        return $model->update($data);
    }
}

<?php

namespace App\Repositories\Quiz;

use App\Contracts\Basic\StoreInterface;
use App\Contracts\Basic\UpdateInterface;
use App\Models\quizzes;

class QuizRepository implements StoreInterface, UpdateInterface
{
    public function __construct()
    {
        //
    }
    public function store($data)
    {
        return quizzes::create($data);
    }
    public function update($id, $data)
    {
        $model = quizzes::findOrFail($id);
        return $model->update($data);
    }

}

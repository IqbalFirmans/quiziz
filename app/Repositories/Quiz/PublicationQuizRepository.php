<?php

namespace App\Repositories\Quiz;

use App\Contracts\Basic\UpdateInterface;
use App\Models\quizzes;

class PublicationQuizRepository implements UpdateInterface
{
    public function __construct()
    {
        //
    }
    public function update($id, $data)
    {
        $model = quizzes::findOrFail($id);
        return $model->update($data);
    }
}

<?php

namespace App\Repositories\Quiz\Question;

use App\Contracts\Basic\UpdateInterface;
use App\Models\questions_quizzes;

class UpdateQuestionRepository implements UpdateInterface
{
    public function __construct()
    {
        //
    }
    public function update($id, $data)
    {
        $model = questions_quizzes::findOrFail($id);
        return $model->update($data);
    }
}

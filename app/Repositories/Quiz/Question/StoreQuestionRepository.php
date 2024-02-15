<?php

namespace App\Repositories\Quiz\Question;

use App\Contracts\Basic\StoreInterface;
use App\Models\questions_quizzes;

class StoreQuestionRepository implements StoreInterface
{
    public function __construct()
    {
        //
    }
    public function store($data)
    {
        return questions_quizzes::create($data);
    }
}

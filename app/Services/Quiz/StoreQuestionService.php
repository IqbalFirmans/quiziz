<?php

namespace App\Services\Quiz;

use App\Models\questions_quizzes;
use App\Repositories\Quiz\Question\StoreOptionRepository;
use App\Repositories\Quiz\Question\StoreQuestionRepository;

class StoreQuestionService
{
    public $question, $option;
    public function __construct(StoreQuestionRepository $question, StoreOptionRepository $option)
    {
        $this->question = $question;
        $this->option = $option;
    }
    public function store_question($data, $id)
    {

        if ($data['answer_true'] == null) {
            # code...
            return false;
        } else {
            $array = [
                "quiz_id" => $id,
                "question" => $data['question'],
                "answer_1" => $data['answer_1'],
                "answer_2" => $data['answer_2'],
                "answer_3" => $data['answer_3'],
                "answer_4" => $data['answer_4'],
                "answer_true" => $data['answer_true'],
            ];
            return $this->question->store($array);
        }
    }
    public function store_option($quiz_id,$id, $data)
    {

        for ($i = 1; $i <= 4; $i++) {
            if ($data['answer_true'] == $i) {
                # code...
                $this->option->store([
                    'quiz_id' => $quiz_id,
                    'question_id' => $id,
                    'option' => $data['answer_' . $i],
                    'true_or_false' => true
                ]);
            } else {
                $this->option->store([
                    'quiz_id' => $quiz_id,
                    'question_id' => $id,
                    'option' => $data['answer_' . $i],
                    'true_or_false' => false
                ]);
            }
        }
    }
}

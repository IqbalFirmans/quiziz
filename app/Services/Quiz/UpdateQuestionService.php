<?php

namespace App\Services\Quiz;

use App\Repositories\Quiz\Question\UpdateOptionRepository;
use App\Repositories\Quiz\Question\UpdateQuestionRepository;
use App\Models\options_questions;

class UpdateQuestionService
{
    public $question, $option;
    public function __construct(UpdateQuestionRepository $question, UpdateOptionRepository $option)
    {
        $this->question = $question;
        $this->option = $option;
    }
    public function update_question($id, $data)
    {
        if ($data['answer_true'] == null) {
            # code...
            return false;
        }
        $data_array = [
            'question' => $data['question']
        ];
        return $this->question->update($id, $data_array);
    }
    public function update_option($id, $data)
    {
        $options = options_questions::where('question_id', $id)->orderBy('created_at', 'asc')->get();
        foreach ($options as $key => $value) {
            $key+=1;
           if ($data['answer_true'] == $key) {
            # code...
            $this->option->update($value->id, [
                'option' => $data['answer_' . $key],
                'true_or_false' => 1
            ]);
           } else {
            # code...
            $this->option->update($value->id, [
                'option' => $data['answer_' . $key],
                'true_or_false' => 0
            ]);
           }

        }


        return true;
    }
}

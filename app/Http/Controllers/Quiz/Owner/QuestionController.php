<?php

namespace App\Http\Controllers\Quiz\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\options_questions;
use App\Models\questions_quizzes;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(QuestionRequest $request, $id)
    {
        $data = $request->validated();
        $questions = questions_quizzes::create([
            'quiz_id' => $id,
            'question' => $data['question']
        ]);
        for ($i=1; $i <= 4; $i++) {
            if ($data['answer_true'] == $i) {
                # code...
                options_questions::create([
                    'question_id' => $questions->id,
                    'option' => $data['answer_'.$i],
                    'true_or_false' => true
                ]);
            } else {
                options_questions::create([
                    'question_id' => $questions->id,
                    'option' => $data['answer_'.$i],
                    'true_or_false' => false
                ]);
            }
        }
        return redirect()->back()->with('success', 'Sukses menambahkan pertanyaan.');
    }
}

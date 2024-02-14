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
        if ($data['answer_true'] == null) {
            # code...
            return redirect()->back()->withErrors('Jawaban benar tidak terisi!');
        }
        $questions = questions_quizzes::create([
            'quiz_id' => $id,
            'question' => $data['question']
        ]);
        for ($i = 1; $i <= 4; $i++) {
            if ($data['answer_true'] == $i) {
                # code...
                options_questions::create([
                    'question_id' => $questions->id,
                    'option' => $data['answer_' . $i],
                    'true_or_false' => true
                ]);
            } else {
                options_questions::create([
                    'question_id' => $questions->id,
                    'option' => $data['answer_' . $i],
                    'true_or_false' => false
                ]);
            }
        }
        return redirect()->back()->with('success', 'Sukses menambahkan pertanyaan.');
    }
    public function edit($id)
    {
        $question = questions_quizzes::findOrFail($id);
        return view('user.quiz.owner.edit', compact('question'));
    }
    public function update($id, QuestionRequest $req)
    {
        try {
            $request = $req->validated();
            //code...
            if ($request['answer_true'] == null) {
                # code...
                return redirect()->back()->withErrors('Jawaban benar tidak terisi!');
            }
            $question = questions_quizzes::findOrFail($id);
            $question->update([
                'question' => $request['question']
            ]);
            $options = options_questions::where('question_id', $id)->orderBy('created_at', 'asc')->get();
            foreach ($options as $key => $value) {
                options_questions::findOrFail($value->id)->update([
                    'option' => $request['answer_' . $key+=1],
                ]);
            }
            options_questions::where('question_id', $id)->update([
                'true_or_false' => 0
            ]);
            options_questions::findOrFail($request['answer_true'])->update([
                'true_or_false' => 1
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors($th->getMessage());
        }

        return redirect('/user/detail-quiz/' . $question->quiz_id)->with('success', 'Sukses mengedit pertanyaan.');
    }
    public function destroy($id)
    {
        $question = questions_quizzes::findOrFail($id);
        if ($question) {
            # code...
            $question->delete();
            return redirect()->back()->with('success', 'Sukses menghapus pertanyaan.');
        } else {
            return redirect()->back()->withErrors('Gagal menghapus pertanyaan.');
        }
    }
}

<?php

namespace App\Http\Controllers\Quiz\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\options_questions;
use App\Models\questions_quizzes;
use App\Models\quizzes;
use App\Models\quizzes_answers;
use App\Services\Quiz\StoreQuestionService;
use App\Services\Quiz\UpdateQuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public $store_question, $update_question;
    public function __construct(StoreQuestionService $store_question, UpdateQuestionService $update_question)
    {
        $this->store_question = $store_question;
        $this->update_question = $update_question;
    }
    public function store(QuestionRequest $request, $id)
    {
        $quiz_id = intval($id);
        $data = $request->validated();
        $questions = $this->store_question->store_question($data, $quiz_id);
        if ($questions == false) {
            return redirect()->back()->withErrors('Jawaban benar tidak terisi!');
        }
        $this->store_question->store_option($quiz_id, $questions->id, $data);
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

            $up_question = $this->update_question->update_question($id, $request);
            if ($up_question == false) {
                # code...
                return redirect()->back()->withErrors('Jawaban benar tidak terisi!');
            }
            $this->update_question->update_option($id, $request);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors($th->getMessage());
        }

        return redirect()->back()->with('success', 'Sukses mengedit pertanyaan.');
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
    public function all_result($id)
    {
        $all_result = quizzes_answers::where('quiz_id', $id)->get();
        $name_quiz = quizzes::findOrFail($id)->name;
        return view('user.quiz.owner.all_result', compact('all_result', 'name_quiz'));
    }
}

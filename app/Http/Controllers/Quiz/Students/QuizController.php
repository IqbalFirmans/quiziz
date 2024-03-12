<?php

namespace App\Http\Controllers\Quiz\Students;

use App\Http\Controllers\Controller;
use App\Models\options_questions;
use App\Models\questions_quizzes;
use App\Models\quizzes;
use App\Models\quizzes_answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function index()
    {
        $all_quiz = quizzes::where('publication_status', 'publik')->get();
        return view('user.quiz.students.quiziz', compact('all_quiz'));
    }
    public function play($id)
    {

        $questions = questions_quizzes::where('quiz_id', $id)->paginate(1);
        $options = options_questions::where('quiz_id', $id)->get();
        return Inertia::render('Index', [
            'sum_questions' => $questions->count(),
            'questions' => $questions,
            'options' => $options,
            'quiz_id' => $id
        ]);
    }
    public function answer_quiz(Request $request, $id)
    {
        $check = quizzes_answers::where('user_id', Auth::user()->id)->where('quiz_id', $request->quiz_id)->where('question_id', $request->question_id)->exists();
        if ($check) {
            return redirect()->back();
        }
        $true_or_false = options_questions::findOrFail($request->option_id);
        quizzes_answers::create([
            'user_id' => Auth::user()->id,
            'quiz_id' => $request->quiz_id,
            'question_id' => $request->question_id,
            'option_id' => $request->option_id,
            'true_or_false' => $true_or_false->true_or_false
        ]);
        return redirect($request->url);
    }
    public function result_quiz($id)
    {
        $true = quizzes_answers::where('quiz_id', $id)->where('user_id', Auth::user()->id)->where('true_or_false', 1)->count();
        $count_question = questions_quizzes::where('quiz_id', $id)->count();
        $false = $count_question - $true;
        $result = $true / $count_question * 100;
        return Inertia::render('End', [
            'true' => $true,
            'count_question' => $count_question,
            'false' => $false,
            'result' => $result
        ]);
    }
}

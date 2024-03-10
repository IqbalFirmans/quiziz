<?php

namespace App\Http\Controllers\Quiz\Students;

use App\Http\Controllers\Controller;
use App\Models\options_questions;
use App\Models\questions_quizzes;
use App\Models\quizzes;
use Illuminate\Http\Request;
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
            'options' => $options
        ]);
    }
}

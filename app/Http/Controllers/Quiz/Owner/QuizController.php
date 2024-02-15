<?php

namespace App\Http\Controllers\Quiz\Owner;

use App\Http\Controllers\Controller;
use App\Models\quizzes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuizRequest;
use App\Models\options_questions;
use App\Models\questions_quizzes;
use App\Repositories\Quiz\QuizRepository;
use App\Services\Quiz\PublicationQuizService;

class QuizController extends Controller
{
    public $quiz, $publication;
    public function __construct(QuizRepository $quiz,  PublicationQuizService $publication)
    {
        $this->quiz = $quiz;
        $this->publication = $publication;
    }
    public function index()
    {
        $all_quiz = quizzes::where('user_id', Auth::user()->id)->get();
        return view('user.quiz.owner.index', compact('all_quiz'));
    }
    public function show($id)
    {
        $quiz = quizzes::findOrFail($id);
        return view('user.quiz.owner.detail', compact("quiz"));
    }
    public function create()
    {
        return view('user.quiz.owner.create');
    }
    public function store(QuizRequest $request)
    {
        $data = $request->validated();

       $this->quiz->store($data);

        return redirect()->route('quiz.index')->with('success', 'Kuis Berhasil Dibuat');

    }
    public function update($id, QuizRequest $request)
    {
        $data = $request->validated();
        $this->quiz->update($id, $data);
        return redirect()->back()->with('success', 'Sukses merubah informasi kuis.');
    }
    public function destroy($id)
    {
        $quiz = quizzes::findOrFail($id)->delete();
        if ($quiz) {
            # code...
            return redirect()->back()->with('success', 'Sukses menghapus kuis!');
        }
    }
    public function publication($id, Request $request)
    {
        $publication = $this->publication->publication($id, $request->all());
        if ($publication == false) {
            # code...
            return redirect()->back()->withErrors('Gagal publikasi, pertanyaan kurang.');
        }
        return redirect()->back()->with('success', 'Sukses mempublikasikan kuis anda.');
    }
}

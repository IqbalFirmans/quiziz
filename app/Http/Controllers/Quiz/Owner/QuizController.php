<?php

namespace App\Http\Controllers\Quiz\Owner;

use App\Http\Controllers\Controller;
use App\Models\quizzes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuizRequest;
class QuizController extends Controller
{
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

        $quiz = new quizzes([
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        $quiz->save();

        return redirect()->route('quiz.index')->with('success', 'Kuis Berhasil Dibuat');

    }
    public function update($id, QuizRequest $request)
    {
        $data = $request->validated();
        $quiz = quizzes::findOrFail($id);
        $quiz->update($data);
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
}

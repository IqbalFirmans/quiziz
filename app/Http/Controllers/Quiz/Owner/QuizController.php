<?php

namespace App\Http\Controllers\Quiz\Owner;

use App\Http\Controllers\Controller;
use App\Models\quizzes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $all_quiz = quizzes::where('user_id', Auth::user()->id)->get();
        return view('user.quiz.owner.index', compact('all_quiz'));
    }
    public function create()
    {
        return view('user.quiz.owner.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:155',
            'description' => 'required|max:355'
        ]);
        $data = $request->all();
        quizzes::create($data);
        return redirect()->route('quiz.index')->with('success', 'Sukses membuat kuis baru, anda sekarang bisa mengedit kuis anda!');
    }
    public function edit($id)
    {
        return view('user.quiz.owner.edit');
    }
    public function update($id, Request $request)
    {

    }
    public function destroy($id)
    {
        
    }
}

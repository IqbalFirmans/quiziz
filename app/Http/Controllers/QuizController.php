<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\quizzes;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.quiz.owner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.quiz.owner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizRequest $request)
    {
        $data = $request->validated();

        // menyimpan image ke storage
        $imagePath = $request->file('image')->store('quiz-image');

        $quiz = new quizzes([
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $imagePath
        ]);

        $quiz->save();

        return redirect()->route('quiz.index')->with('success', 'Kuis Berhasil Dibuat');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.quiz.owner.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

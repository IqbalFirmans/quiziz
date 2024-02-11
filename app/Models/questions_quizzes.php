<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions_quizzes extends Model
{
    use HasFactory;
    protected $table = "questions_quizzes";
    protected $fillable = [
        'quiz_id',
        'question'
    ];
    public function Quiz()
    {
        return $this->belongsTo(quizzes::class, 'quiz_id');
    }
    public function Options()
    {
        return $this->hasMany(options_questions::class, 'question_id');
    }
}

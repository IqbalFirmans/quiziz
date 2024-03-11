<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    /**
     * Get all of the quizzes_answers for the questions_quizzes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizzes_answers(): HasMany
    {
        return $this->hasMany(quizzes_answers::class, 'question_id', 'id');
    }
}

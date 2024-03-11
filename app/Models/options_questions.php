<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class options_questions extends Model
{
    use HasFactory;
    protected $table = "options_questions";
    protected $fillable = [
        'quiz_id',
        'question_id',
        'option',
        'true_or_false'
    ];
    /**
     * Get the quiz that owns the options_questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(quizzes::class, 'quiz_id', 'id');
    }
    public function Question()
    {
        $this->belongsTo(questions_quizzes::class, 'question_id');
    }
    /**
     * Get all of the quizzes_answers for the options_questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizzes_answers(): HasMany
    {
        return $this->hasMany(quizzes_answers::class, 'option_id', 'id');
    }
}

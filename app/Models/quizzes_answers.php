<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class quizzes_answers extends Model
{
    use HasFactory;
    protected $table = 'quizzes_answers';
    protected $fillable = [
        'user_id',
        'quiz_id',
        'question_id',
        'option_id',
        'true_or_false'
    ];
    /**
     * Get the user that owns the quizzes_answers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * Get the quiz that owns the quizzes_answers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(quizzes::class, 'quiz_id', 'id');
    }
    /**
     * Get the question that owns the quizzes_answers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(questions_quizzes::class, 'question_id', 'id');
    }
    /**
     * Get the option that owns the quizzes_answers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option(): BelongsTo
    {
        return $this->belongsTo(options_questions::class, 'option_id', 'id');
    }
}

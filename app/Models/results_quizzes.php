<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class results_quizzes extends Model
{
    use HasFactory;
    protected $table = 'results_quizzes';
    protected $fillable = [
        'user_id',
        'quiz_id',
        'answer_true',
        'answer_false',
        'result'
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function Quiz()
    {
        return $this->belongsTo(quizzes::class, 'quiz_id', 'id');
    }
}

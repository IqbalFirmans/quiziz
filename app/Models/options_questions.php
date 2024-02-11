<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class options_questions extends Model
{
    use HasFactory;
    protected $table = "options_questions";
    protected $fillable = [
        'question_id',
        'option',
        'true_or_false'
    ];
    public function Questions()
    {
        $this->belongsTo(questions_quizzes::class, 'question_id');
    }
}

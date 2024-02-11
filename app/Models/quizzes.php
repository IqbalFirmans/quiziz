<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizzes extends Model
{
    use HasFactory;
    protected $table = "quizzes";
    protected $fillable = [
        'user_id',
        'name',
        'description'
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Questions()
    {
        return $this->hasMany(questions_quizzes::class, 'quiz_id');
    }
}

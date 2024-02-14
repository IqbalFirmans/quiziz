<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class quizzes extends Model
{
    use HasFactory;
    protected $table = "quizzes";
    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = Auth::user()->id;
        });
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Questions()
    {
        return $this->hasMany(questions_quizzes::class, 'quiz_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;

class quizzes extends Model
{
    use HasFactory;
    protected $table = "quizzes";
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'publication_at',
        'publication_status'
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
    /**
     * Get all of the quizzes_answer for the quizzes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizzes_answers(): HasMany
    {
        return $this->hasMany(quizzes_answers::class, 'quiz_id', 'id');
    }
}

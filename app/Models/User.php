<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'biodata',
        'password',
        'role',
        'github_id',
        'github_token',
        'github_refresh_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'github_id',
        'github_token',
        'github_refresh_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token): void
    {
        $url = 'http://127.0.0.1:8000/auth/reset-password/'.$token.'?email='.urlencode($this->email);
        $this->notify(new ResetPasswordNotification($url));
    }

    public function Quizzes()
    {
        return $this->hasMany(quizzes::class, 'user_id');
    }

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }
    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function Likes()
    {
        return $this->hasMany(Like::class);
    }
    /**
     * Get all of the quizzes_answer for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizzes_answers(): HasMany
    {
        return $this->hasMany(quizzes_answers::class, 'user_id', 'id');
    }
    public function IsFinish($quiz_id) {
        return quizzes_answers::where('quiz_id', $quiz_id)->where('user_id', $this->id)->exists();
    }
    public function Results_Quizzes()
    {
        return $this->hasMany(results_quizzes::class, 'user_id', 'id');
    }
}

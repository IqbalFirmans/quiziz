<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function childrens()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasLike()
    {
        return $this->hasOne(Like::class, 'likes.user_id', Auth::user()->id);
    }

    public function isLike()
    {
        return Like::where('user_id', Auth::user()->id)->where('comment_id', $this->id)->exists();
    }

    public function totalLikes()
    {
        return $this->hasMany(Like::class)->count();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'description',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Likes()
    {
        return $this->hasMany(Like::class);
    }
    public function isLike()
    {
        return Like::where('user_id', Auth::user()->id)->where('post_id', $this->id)->exists();
    }
}

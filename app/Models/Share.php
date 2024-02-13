<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    protected $table = 'shares';
    protected $fillable = [
        'user_id',
        'description',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

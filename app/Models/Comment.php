<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'content',
        'user_id',
        'game_id',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(MyGame::class);
    }

    public function getDate()
    {
        return $this->date;
    }

    public function countLikes()
    {
        return $this->likes()->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }



}

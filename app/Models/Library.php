<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = [
        'user_id',
        'game_id',
    ];


    public static function hasGameInLibrary($userId, $gameId)
    {
        return self::where('user_id', $userId)
                    ->where('game_id', $gameId)
                    ->exists();
    }

}

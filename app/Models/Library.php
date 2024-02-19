<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = [
        'user_id',
        'game_id',
        'state',
        'score'

    ];


    public static function hasGameInLibrary($userId, $gameId)
    {
        return self::where('user_id', $userId)
                    ->where('game_id', $gameId)
                    ->exists();
    }

    public static function getGameState($userId, $gameId)
    {
        return self::where('user_id', $userId)
                    ->where('game_id', $gameId)
                    ->value('state');
    }

    public static function getScore($userId, $gameId)
    {
        return self::where('user_id', $userId)
                    ->where('game_id', $gameId)
                    ->value('score');

    }
    public static function countUserGames($userId)
    {
        return self::where('user_id', $userId)->count();

    }
}

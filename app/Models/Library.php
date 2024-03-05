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

    public function myGame()
    {
        return $this->belongsTo(MyGame::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function hasGameInLibrary($userId, $gameId)
    {
        return self::where('user_id', $userId)
                    ->where('game_id', $gameId)
                    ->exists();
    }

    public static function getGameState($userId, $gameId)
    {
        $state = self::where('user_id', $userId)
                    ->where('game_id', $gameId)
                    ->value('state');

        return ucfirst($state);
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

    public static function search($search)
    {
    return empty($search) ? static::query()
        : static::whereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        })->orWhere('game_id', 'like', '%'.$search.'%')
        ->orWhere('state', 'like', '%'.$search.'%');
    }
}

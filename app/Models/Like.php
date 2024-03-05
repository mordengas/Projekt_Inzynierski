<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'comment_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function hasUserLikedComment($userId, $commentId)
    {
        return self::where('user_id', $userId)
                    ->where('comment_id', $commentId)
                    ->exists();
    }
    public static function deleteLike($userId, $commentId)
    {
        self::where('user_id', $userId)
            ->where('comment_id', $commentId)
            ->delete();
    }
    public static function search($search)
    {
    return empty($search) ? static::query()
        : static::whereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        })->orWhere('comment_id', 'like', '%'.$search.'%');
    }
}

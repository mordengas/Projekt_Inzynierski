<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class MyGame extends Model
{
    use Notifiable, Searchable;

    protected $fillable = [
        'id',
        'name',
        'crating',
        'cratingc',
        'rating',
        'ratingc',
        'game_modes',
        'genres',
        'platforms',
        'release_date',
        'cover'
    ];

    /**
     * Check if the game has a cover image.
     *
     * @return bool
     */
    public function hasCoverImage()
    {
        return !empty($this->cover);
    }

    /**
     * Get the cover image of the game.
     *
     * @return string|null
     */
    public function getCoverImage()
    {
        return $this->cover;
    }

    public function toSearchableArray()
    {

        return ['name' => $this->name
        ];
    }
}

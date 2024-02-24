<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use MarcReichel\IGDBLaravel\Models\GameMode;
use MarcReichel\IGDBLaravel\Models\Genre;
use MarcReichel\IGDBLaravel\Models\Platform;

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
        'cover',
        'description',
    ];


    /**
     * Get the library that has many games.
     */
    public function library()
    {
        return $this->hasMany(Library::class);
    }

        /**
     * Get the library that has many games.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

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
        return [
            'name' => $this->name,
        ];
    }


    public static function gameModesToString($gameModes)
    {
        $gameModes = explode(' ', $gameModes);
        $textVersions = [];

        foreach ($gameModes as $mode) {
            $textVersions[] = GameMode::find((int)$mode)->name;
        }

        return implode(', ', $textVersions);
    }
    public static function platformsToString($platforms)
    {
        $platforms = explode(' ', $platforms);
        $textVersions = [];

        foreach ($platforms as $platform) {
            $textVersions[] = Platform::find((int)$platform)->name;
        }

        return implode(', ', $textVersions);
    }

    public static function genresToString($genres)
    {
        $genres = explode(' ', $genres);
        $textVersions = [];

        foreach ($genres as $genre) {
            $textVersions[] = Genre::find((int)$genre)->name;
        }

        return implode(', ', $textVersions);
    }
}

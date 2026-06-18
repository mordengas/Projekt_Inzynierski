<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use MarcReichel\IGDBLaravel\Models\GameMode;
use MarcReichel\IGDBLaravel\Models\Genre;
use MarcReichel\IGDBLaravel\Models\Platform;
use App\Models\Library;

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
        //dd($gameModes);
        if($gameModes === ""){
            return "No game modes.";
        }else{
            $gameModes = explode(' ', $gameModes);
            $textVersions = [];

            foreach ($gameModes as $mode) {
                $textVersions[] = GameMode::find((int)$mode)->name;
            }

            return implode(', ', $textVersions);
        }

    }
    public static function platformsToString($platforms)
    {
        if($platforms === null){
            return "No platforms.";
        }else{
            $platforms = explode(' ', $platforms);
            $textVersions = [];

            foreach ($platforms as $platform) {
                $textVersions[] = Platform::find((int)$platform)->name;
            }

            return implode(', ', $textVersions);
        }

    }

    public static function genresToString($genres)
    {
        if($genres === null){
            return "No genres.";
        }else{
            $genres = explode(' ', $genres);
            $textVersions = [];

            foreach ($genres as $genre) {
                $textVersions[] = Genre::find((int)$genre)->name;
            }

            return implode(', ', $textVersions);
        }

    }

    public static function getTopThreeGenres(array $games)
    {
        // Initialize an empty array to store genre counts
        $genreCounts = [];

        // Iterate over each game in the array
        foreach ($games as $game) {
            // Extract the genres as an array
            $genres = explode(' ', $game['genres']);

            // Update genre counts for each genre in the current game
            foreach ($genres as $genre) {
                if (!isset($genreCounts[$genre])) {
                    $genreCounts[$genre] = 0;
                }
                $genreCounts[$genre]++;
            }
        }

        // Create a collection from the genre counts
        $genreCountsCollection = collect($genreCounts);

        // Sort the collection in descending order by genre count
        $sortedGenreCounts = $genreCountsCollection->sort(function ($a, $b) {
            return $b <=> $a; // use spaceship operator for descending order
        });

        // Select and return the top 3 genres (or all if less than 3 exist)
        return $sortedGenreCounts->take(min(3, $sortedGenreCounts->count()));
    }

    public static function getTopThreeGameModes(array $games)
    {
    // Initialize an empty array to store game mode counts
    $gameModeCounts = [];

    // Iterate over each game in the array
    foreach ($games as $game) {
        // Extract the game modes as an array
        $gameModes = explode(' ', $game['game_modes']);

        // Update game mode counts for each mode in the current game
        foreach ($gameModes as $mode) {
            if (!isset($gameModeCounts[$mode])) {
                $gameModeCounts[$mode] = 0;
            }
            $gameModeCounts[$mode]++;
        }
    }

    $gameModeCountsCollection = collect($gameModeCounts);

    $sortedGameModeCounts = $gameModeCountsCollection->sort(function ($a, $b) {
        return $b <=> $a; // use spaceship operator for descending order
    });

    // Select the top 3 game modes
    return $sortedGameModeCounts->take(min(3, $sortedGameModeCounts->count())); // Return top 3 elements with keys
    }

    public static function getGamesWithMeanScores()
{
    // Get all games
    $games = MyGame::all();

    // Store results as an array
    $gamesWithScores = [];

    // Loop through each game
    foreach ($games as $game) {
        $totalScore = 0;
        $scoreCount = 0;

        // Get libraries associated with the game
        $libraries = Library::where('game_id', $game->id)->get()->all();
        // Check if there are any libraries
        if (count($libraries) > 0) {
            foreach ($libraries as $library) {
                // Replace this with actual logic to access score from Library model
                // Assuming Library has a "score" field
                $totalScore += $library->score;
                $scoreCount++;
            }

            if ($scoreCount > 0) {
                $meanScore = $totalScore / $scoreCount;
            } else {
                $meanScore = null;
            }
        } else {
            $meanScore = null;
        }

        // Add game ID and mean score to the results array
        $gamesWithScores[] = [
            'game_id' => $game->id,
            'mean_score' => $meanScore,
        ];
    }

    return $gamesWithScores; // Return an array of game IDs and mean scores
}
}

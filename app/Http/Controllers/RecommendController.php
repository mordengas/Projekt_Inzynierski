<?php

namespace App\Http\Controllers;


use App\Models\MyGame; // Import the MyGame class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MarcReichel\IGDBLaravel\Models\Game;
use Illuminate\Support\Facades\View; // Import the View class from the correct namespace

class RecommendController extends Controller
{
    public function index()
    {

        return view('recommend');
    }
    public function recommendGames(Request $request)
    {
        // Retrieve the current user
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Retrieve the user's preferences or any other relevant data
        $userPreferences = $user->preferences;

        // Perform your recommendation logic here
        // ...

        // For example, let's recommend some games based on the user's preferences
        $recommendedGames = MyGame::whereIn('genre', $userPreferences)->get(); // Use the MyGame class

        return response()->json(['games' => $recommendedGames]);
    }

    public function store(Request $request){

        $preferences = [
            "2" => 1, // Point-and-click
            "4" => 1, // Fighting
            "5" => 0, // Shooter
            "7" => 1, // Music
            "8" => 0, // Platform
            "9" => 0, // Puzzle
            "10" => 0, // Racing
            "11" => 1, // Real Time Strategy (RTS)
            "12" => 0, // Role-playing (RPG)
            "13" => 1, // Simulator
            "14" => 0, // Sport
            "15" => 1, // Strategy
            "16" => 1, // Turn-based strategy (TBS)
            "24" => 0, // Tactical
            "25" => 0, // Hack and slash/Beat 'em up
            "26" => 1, // Quiz/Trivia
            "30" => 0, // Pinball
            "31" => 0, // Adventure
            "32" => 1, // Indie
            "33" => 0, // Arcade
            "34" => 0, // Visual Novel
            "35" => 1, // Card & Board Game
            "36" => 1, // MOBA
        ];

        $userPreferences = [
            "2" => (int)$request->input('point-and-click', 0), // Point-and-click
            "4" => (int)$request->input('fighting', 0), // Fighting
            "5" => (int)$request->input('shooter', 0), // Shooter
            "7" => (int)$request->input('music', 0), // Music
            "8" => (int)$request->input('platform', 0), // Platform
            "9" => (int)$request->input('puzzle', 0), // Puzzle
            "10" => (int)$request->input('racing', 0), // Racing
            "11" => (int)$request->input('rts', 0), // Real Time Strategy (RTS)
            "12" => (int)$request->input('rpg', 0), // Role-playing (RPG)
            "13" => (int)$request->input('simulator', 0), // Simulator
            "14" => (int)$request->input('sport', 0), // Sport
            "15" => (int)$request->input('strategy', 0), // Strategy
            "16" => (int)$request->input('tbs', 0), // Turn-based strategy (TBS)
            "24" => (int)$request->input('tactical', 0), // Tactical
            "25" => (int)$request->input('hack-and-slash', 0), // Hack and slash/Beat 'em up
            "26" => (int)$request->input('quiz', 0), // Quiz/Trivia
            "30" => (int)$request->input('pinball', 0), // Pinball
            "31" => (int)$request->input('adventure', 0), // Adventure
            "32" => (int)$request->input('indie', 0), // Indie
            "33" => (int)$request->input('arcade', 0), // Arcade
            "34" => (int)$request->input('visual-novel', 0), // Visual Novel
            "35" => (int)$request->input('card-board', 0), // Card & Board Game
            "36" => (int)$request->input('moba', 0), // MOBA
        ];


        $platforma[] = (int)$request->platforma;
        $rok = (int)$request->rok_wydania;

        $games = Game::whereNotNull('platforms')->whereNotNull('genres')
         ->whereIn('game_modes', [4,5,6])->whereIn('platforms', $platforma)
         ->whereYear('first_release_date','>=', $rok)
         ->limit(100)->get();


    foreach( $games as $game ){

        // error_log(count($game->game_modes));
        if( $game->game_modes != null)
        {

        $mygame = new MyGame;
        $mygame->name = $game->name;

        if( $game->aggregated_rating == null){
            $mygame->crating = "no data available";
            $mygame->cratingc = "no data available";

        }else{
            $mygame->crating = $game->aggregated_rating;
            $mygame->cratingc = $game->aggregated_rating_count;
        }

        if( $game->rating == null){
            $mygame->rating = "no data available";
            $mygame->ratingc = "no data available";

        }else{
            $mygame->rating = $game->rating;
            $mygame->ratingc = $game->rating_count;
        }
        unset($arr1);
        $arr1[] = $game->game_modes;
        $mygame->game_modes = implode(" ", $arr1[0]);

        unset($arr2);
        $arr2[] = $game->genres;
        $mygame->genres = implode(" ", $arr2[0]);

        unset($arr3);
        $arr3[] = $game -> platforms;
        $mygame->platforms = implode(" ", $arr3[0]);

        $mygame->release_date = $game -> first_release_date;
        if($game->cover != null){
        $mygame->cover = $game -> cover;
        }else{
            $mygame->cover = "no cover available";
        }

        $mygame = MyGame::updateOrInsert([
            'id' => $game->id,
        ], [
            'name' => $game->name,
            'crating' => $game->aggregated_rating ?? "no data available",
            'cratingc' => $game->aggregated_rating_count ?? "no data available",
            'rating' => $game->rating ?? "no data available",
            'ratingc' => $game->rating_count ?? "no data available",
            'game_modes' => implode(" ", $game->game_modes ?? []),
            'genres' => implode(" ", $game->genres ?? []),
            'platforms' => implode(" ", $game->platforms ?? []),
            'release_date' => $game->first_release_date,
            'cover' => $game->cover ?? "no cover available",
        ]);

        }
    }

        $mygames = MyGame::all();

        $neighbors = $this->find_games($userPreferences, $mygames, 3);

        return View::make('recommend')->with('recom', $neighbors);
    }


public function find_games($pref, $games, $i){

    $ratings = [];

    foreach($games as $game){

        $rating = $this -> game_ratings($game, $pref);
        $ratings[] = ["game_id" => $game->id, "name" => $game->name,"cover" => $game->cover, "rating" => $rating];
    }
     // Sortowanie gier od najwyzej ocenianej do najniżej
     usort($ratings, function($a, $b) {
         return $b["rating"] - $a["rating"];
     });

    $games = array_slice($ratings, 0, $i);

    return $games;
}

public function game_ratings($game, $pref){

    $rating = 0;
    foreach(explode(' ',$game->genres) as $genre){
        if (isset($pref[$genre]) && $pref[$genre] == 1) {
            $rating++;
        }
    }
    error_log($rating);
    return $rating;
}

public function storeWeight(Request $request){

    $preferences = [
        "1" => 8, // single player
        "2" => 2, // multi-player
        "3" => 7, // co-op
        "4" => 6, // Split screen
        "5" => 4, // MMO
        "6" => 5, // Battle Royale
    ];

    $userPreferences = [
        "1" => (int)$request->single_player, // single player
        "2" => (int)$request->multi_player, // multi-player
        "3" => (int)$request->co_op, // co-op
        "4" => (int)$request->split_screen, // Split screen
        "5" => (int)$request->mmo, // MMO
        "6" => (int)$request->battle_royale, // Battle Royale
    ];

    $platforma[] = (int)$request->platforma;
    $rok = (int)$request->rok_wydania;

    $games = Game::whereNotNull('platforms')->whereNotNull('genres')
     ->whereIn('game_modes', [4,5,6])->whereIn('platforms', $platforma)
     ->whereYear('first_release_date','>=', $rok)
     ->limit(300)->get();


foreach( $games as $game ){

    // error_log(count($game->game_modes));
    if( $game->game_modes != null)
    {

    $mygame = new MyGame;
    $mygame->name = $game->name;

    if( $game->aggregated_rating == null){
        $mygame->crating = "no data available";
        $mygame->cratingc = "no data available";

    }else{
        $mygame->crating = $game->aggregated_rating;
        $mygame->cratingc = $game->aggregated_rating_count;
    }

    if( $game->rating == null){
        $mygame->rating = "no data available";
        $mygame->ratingc = "no data available";

    }else{
        $mygame->rating = $game->rating;
        $mygame->ratingc = $game->rating_count;
    }
    unset($arr1);
    $arr1[] = $game->game_modes;
    $mygame->game_modes = implode(" ", $arr1[0]);

    unset($arr2);
    $arr2[] = $game->genres;
    $mygame->genres = implode(" ", $arr2[0]);

    unset($arr3);
    $arr3[] = $game -> platforms;
    $mygame->platforms = implode(" ", $arr3[0]);

    $mygame->release_date = $game -> first_release_date;

    if($game->cover != null){
    $mygame->cover = $game -> cover;
    }else{
        $mygame->cover = "no cover available";
    }

    $mygame = MyGame::updateOrInsert([
        'id' => $game->id,
    ], [
        'name' => $game->name,
        'crating' => $game->aggregated_rating ?? "no data available",
        'cratingc' => $game->aggregated_rating_count ?? "no data available",
        'rating' => $game->rating ?? "no data available",
        'ratingc' => $game->rating_count ?? "no data available",
        'game_modes' => implode(" ", $game->game_modes ?? []),
        'genres' => implode(" ", $game->genres ?? []),
        'platforms' => implode(" ", $game->platforms ?? []),
        'release_date' => $game->first_release_date,
        'cover' => $game->cover ?? "no cover available",
    ]);

    }
}



    $mygames = MyGame::all();

    $neighbors = $this->find_games_weight($userPreferences, $mygames, 3);

    return View::make('recommend')->with('recom', $neighbors);
}

public function find_games_weight($pref, $games, $i){

$ratings = [];

foreach($games as $game){

    $rating = $this -> game_ratings_weight($game, $pref);
    $ratings[] = ["game_id" => $game->id, "name" => $game->name,"cover" => $game->cover, "rating" => $rating];
}
 // Sortowanie gier od najwyzej wycenionej do najniżej
 usort($ratings, function($a, $b) {
     return $b["rating"] - $a["rating"];
 });

$games = array_slice($ratings, 0, $i);

return $games;
}

public function game_ratings_weight($game, $pref){

$rating = 0;
$i = 0;
foreach(explode(' ',$game->game_modes) as $mode){
    if (isset($pref[$mode])) {
        $i++;
        $rating = $pref[$mode];
    }
}
$rating = $rating * ((6-$i)/6);

return $rating;
}
}

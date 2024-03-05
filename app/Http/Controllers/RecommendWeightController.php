<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyGame;
use MarcReichel\IGDBLaravel\Models\Game;
use App\Models\Library;
use App\Models\User;
use App\Models\GraphWeight;
use App\Models\Helpers\Graph;

class RecommendWeightController extends Controller
{

    public function storeWeight(Request $request){

        $graph = new Graph();

        $graph->addVertex('Fighting');
        $graph->addVertex('Shooter');
        $graph->addVertex('Music');
        $graph->addVertex('Platform');
        $graph->addVertex('Puzzle');
        $graph->addVertex('Racing');
        $graph->addVertex('Real Time Strategy (RTS)');
        $graph->addVertex('Role-playing (RPG)');
        $graph->addVertex('Simulator');
        $graph->addVertex('Sport');
        $graph->addVertex('Strategy');
        $graph->addVertex('Turn-based strategy (TBS)');
        $graph->addVertex('Tactical');
        $graph->addVertex('Quiz/Trivia');
        $graph->addVertex("Hack and slash/Beat 'em up");
        $graph->addVertex('Pinball');
        $graph->addVertex('Adventure');
        $graph->addVertex('Arcade');
        $graph->addVertex('Visual Novel');
        $graph->addVertex('Indie');
        $graph->addVertex('Card & Board Game');
        $graph->addVertex('MOBA');
        $graph->addVertex('Point-and-click');

        $edges = GraphWeight::all();
        foreach($edges as $edge){
            $graph->addEdge($edge->start, $edge->destination, $edge->weight);
        }
        // $preferences = [
        //     "1" => 8, // single player
        //     "2" => 2, // multi-player
        //     "3" => 7, // co-op
        //     "4" => 6, // Split screen
        //     "5" => 4, // MMO
        //     "6" => 5, // Battle Royale
        // ];

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

        MyGame::updateOrInsert([
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
            'description' => $game->summary ?? 'no description available',
        ]);

    }

        $searchPlatforma ='% '.$request->platforma.' %';
        $searchYear = "$request->rok_wydania-01-01 00:00:00";

        $mygames = MyGame::where('platforms', 'LIKE', $searchPlatforma)
        ->where('release_date', '>=', $searchYear)->get();

        $neighbors = $this->find_games($userPreferences, $mygames, 3);

        $gameIds = array_column($neighbors, 'game_id');
        $mygames_reco = MyGame::whereIn('id', $gameIds)->get()->all();

        return view('recommend')->with('games', $mygames_reco)->with('activeTab', 'content1')->with('graph', $graph);
    }

    public function find_games($pref, $games, $i){
        if(auth()->check() && Library::countUserGames(auth()->user()->id) >= 10){
            $user_id = auth()->user()->id;
            $library = User::find($user_id)->library()->get();
            $userGames = MyGame::whereIn('id', $library->pluck('game_id'))->get()->all();
            $topThreeGenres = MyGame::getTopThreeGenres($userGames)->toArray();

        }

    $ratings = [];

    foreach($games as $game){

        $rating = $this -> game_ratings($game, $pref);

        if(isset($topThreeGenres)){
        // Calculate intersecting genres count
        $intersectingGenres = count(array_intersect(explode(' ', $game->genres), $topThreeGenres));

        // Adjust rating based on intersecting genres and preferences
        $rating += $intersectingGenres * 0.5;

        error_log($rating);
        }
        $ratings[] = [
            "game_id" => $game->id,
            "name" => $game->name,
            "cover" => $game->cover,
            "rating" => $rating
        ];
    }
     // Sortowanie gier od najwyzej wycenionej do najniżej
     usort($ratings, function($a, $b) {
         return $b["rating"] - $a["rating"];
     });

    $games = array_slice($ratings, 0, $i);

    return $games;
    }

    public function game_ratings($game, $pref){

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

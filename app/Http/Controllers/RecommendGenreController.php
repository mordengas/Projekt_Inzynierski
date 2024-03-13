<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyGame;
use MarcReichel\IGDBLaravel\Models\Game;
use App\Models\Library;
use App\Models\User;
use App\Models\GraphWeight;
use App\Models\Helpers\Graph;

class RecommendGenreController extends Controller
{
    public function storeGenre(Request $request){

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
        //     "2" => 1, // Point-and-click
        //     "4" => 1, // Fighting
        //     "5" => 0, // Shooter
        //     "7" => 1, // Music
        //     "8" => 0, // Platform
        //     "9" => 0, // Puzzle
        //     "10" => 0, // Racing
        //     "11" => 1, // Real Time Strategy (RTS)
        //     "12" => 0, // Role-playing (RPG)
        //     "13" => 1, // Simulator
        //     "14" => 0, // Sport
        //     "15" => 1, // Strategy
        //     "16" => 1, // Turn-based strategy (TBS)
        //     "24" => 0, // Tactical
        //     "25" => 0, // Hack and slash/Beat 'em up
        //     "26" => 1, // Quiz/Trivia
        //     "30" => 0, // Pinball
        //     "31" => 0, // Adventure
        //     "32" => 1, // Indie
        //     "33" => 0, // Arcade
        //     "34" => 0, // Visual Novel
        //     "35" => 1, // Card & Board Game
        //     "36" => 1, // MOBA
        // ];

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
         ->whereNotNull('game_modes')->whereIn('platforms', $platforma)
         ->whereYear('first_release_date','>=', $rok)
         ->limit(300)->get();


    foreach( $games as $game ){

        // error_log(count($game->game_modes));
        if( $game->game_modes != null)
        {

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
    }

        $searchPlatforma ='% '.$request->platforma.' %';
        $searchYear = "$request->rok_wydania-01-01 00:00:00";

        $mygames = MyGame::where('platforms', 'LIKE', $searchPlatforma)
        ->where('release_date', '>=', $searchYear)->get();

        $neighbors = $this->find_games($userPreferences, $mygames, 3);

        $gameIds = array_column($neighbors, 'game_id');
        $mygames_reco = MyGame::whereIn('id', $gameIds)->get()->all();

        return view('recommend')->with('games', $mygames_reco)->with('activeTab', 'content2')->with('graph', $graph);
    }


    public function find_games($pref, $games, $i){

        if(auth()->check() && Library::countUserGames(auth()->user()->id) >= 10){
            $user_id = auth()->user()->id;
            $library = User::find($user_id)->library()->get();
            $userGames = MyGame::whereIn('id', $library->pluck('game_id'))->get()->all();
            $topThreeGameModes = MyGame::getTopThreeGenres($userGames)->toArray();

        }

        $ratings = [];

        foreach($games as $game){

            $rating = $this -> game_ratings($game, $pref);

            if(isset($topThreeGameModes)){
                // Calculate intersecting genres count
                $intersectingGameModes = count(array_intersect(explode(' ', $game->genres), $topThreeGameModes));

                // Adjust rating based on intersecting genres and preferences
                $rating += $intersectingGameModes * 0.5;
                }

                error_log($rating);

            $ratings[] = [
                "game_id" => $game->id,
                "name" => $game->name,
                "cover" => $game->cover,
                "rating" => $rating
            ];
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

        return $rating;
    }
}

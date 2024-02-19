<?php

namespace App\Http\Controllers;

use App\Models\MyGame;
use MarcReichel\IGDBLaravel\Models\Game;
use Illuminate\Http\Request;
use App\Models\Helpers\Graph;
use App\Models\GraphWeight;
use MarcReichel\IGDBLaravel\Models\Genre;
use Illuminate\Support\Facades\View;

class GameControllerGraph extends Controller{

    public function graph(){

    // Użycie grafu
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

    $vertices = ['Quiz/Trivia', 'MOBA', 'Tactical'];

    $vertex = $graph->traverseGraph($vertices, 3);
        //dd($vertex);
    $genre_id = array(Genre::where('name', $vertex)->first()->id);

    $games = Game::whereNotNull('platforms')->whereNotNull('genres')->whereIn('genres', $genre_id)
    ->orderBy('rating','desc' )->limit(3)->get();

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

        $mygames = MyGame::whereIn('id', $games->pluck('id'))->get()->all();

        return view('recommend')->with('games', $mygames);

    }
}

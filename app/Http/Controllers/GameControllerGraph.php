<?php

namespace App\Http\Controllers;

use App\Models\MyGame;
use MarcReichel\IGDBLaravel\Models\Game;
use Illuminate\Http\Request;
use App\Models\Helpers\Graph;
use MarcReichel\IGDBLaravel\Models\Genre;

class GameControllerGraph extends Controller{

    public function index(){

    // Użycie grafu
    $graph = new Graph();

    $graph->addVertex('MOBA');
    $graph->addVertex('Racing');
    $graph->addVertex('Simulator');
    $graph->addVertex('Sport');
    $graph->addVertex('Music');
    $graph->addVertex('Fighting');
    $graph->addVertex('Shooter');
    $graph->addVertex('Platform');
    $graph->addVertex('RPG');
    $graph->addVertex('Arcade');
    $graph->addVertex('Puzzle');
    $graph->addVertex('RTS');
    $graph->addVertex('TBS');
    $graph->addVertex('Strategy');
    $graph->addVertex('Tactical');
    $graph->addVertex('Hack and slash');
    $graph->addVertex('Pinball');
    $graph->addVertex('Adventure');
    $graph->addVertex('Visual Novel');
    $graph->addVertex('Indie');
    $graph->addVertex('Point and click');
    $graph->addVertex('Quiz/Trivia');
    $graph->addVertex('Card and Board Game');

    $graph->addEdge('Fighting', 'Shooter', 3);
    $graph->addEdge('Fighting', 'Platform', 4);
    $graph->addEdge('Fighting', 'RPG', 4);
    $graph->addEdge('Fighting', 'Arcade', 6);

    $graph->addEdge('Shooter', 'Platform', 3);
    $graph->addEdge('Shooter', 'RPG', 3);
    $graph->addEdge('Shooter', 'RTS', 3);

    $graph->addEdge('Music', 'Puzzle', 4);
    $graph->addEdge('Music', 'Sport', 3);

    $graph->addEdge('Platform', 'Adventure', 6);
    $graph->addEdge('Platform', 'RPG', 3);

    $graph->addEdge('Puzzle', 'Pinball', 5);
    $graph->addEdge('Puzzle', 'Adventure', 6);

    $graph->addEdge('Racing', 'Simulator', 6);
    $graph->addEdge('Racing', 'Sport', 8);

    $graph->addEdge('RTS', 'Strategy', 9);
    $graph->addEdge('RTS', 'TBS', 9);
    $graph->addEdge('RTS', 'Tactical', 9);

    $graph->addEdge('RPG', 'Adventure', 7);
    $graph->addEdge('RPG', 'TBS', 4);
    $graph->addEdge('RPG', 'Hack and slash', 6);
    $graph->addEdge('RPG', 'Point and click', 5);
    $graph->addEdge('RPG', 'Indie', 8);

    $graph->addEdge('Simulator', 'Racing', 6);
    $graph->addEdge('Simulator', 'Strategy', 6);
    $graph->addEdge('Simulator', 'Sport', 8);

    $graph->addEdge('Sport', 'Racing', 8);
    $graph->addEdge('Sport', 'Simulator', 8);

    $graph->addEdge('Hack and slash', 'Arcade', 8);
    $graph->addEdge('Hack and slash', 'RPG', 6);
    $graph->addEdge('Hack and slash', 'Adventure', 3);

    $graph->addEdge('Pinball', 'Arcade', 9);
    $graph->addEdge('Pinball', 'Simulator', 6);

    $graph->addEdge('Adventure', 'Puzzle', 7);
    $graph->addEdge('Adventure', 'Point and click', 9);
    $graph->addEdge('Adventure', 'RPG', 6);

    $graph->addEdge('Arcade', 'Platform', 8);
    $graph->addEdge('Arcade', 'Shooter', 8);
    $graph->addEdge('Arcade', 'Puzzle', 6);
    $graph->addEdge('Arcade', 'Racing', 6);
    $graph->addEdge('Arcade', 'Sport', 6);
    $graph->addEdge('Arcade', 'Fighting', 5);
    $graph->addEdge('Arcade', 'Adventure', 3);

    $graph->addEdge('Visual Novel', 'Adventure', 9);
    $graph->addEdge('Visual Novel', 'Simulator', 6);
    $graph->addEdge('Visual Novel', 'RPG', 6);

    $graph->addEdge('MOBA', 'RTS', 8);
    $graph->addEdge('MOBA', 'RPG', 6);

    $graph->addEdge('Indie', 'Adventure', 8);
    $graph->addEdge('Indie', 'Platform', 6);
    $graph->addEdge('Indie', 'Puzzle', 6);

    $graph->addEdge('Point and click', 'Adventure', 9);
    $graph->addEdge('Point and click', 'Puzzle', 8);
    $graph->addEdge('Point and click', 'RPG', 5);

    $graph->addEdge('Quiz/Trivia', 'Puzzle', 8);

    $graph->addEdge('Card and Board Game', 'Strategy', 8);
    $graph->addEdge('Card and Board Game', 'Puzzle', 8);
    $graph->addEdge('Card and Board Game', 'RPG', 6);

    $vertices = ['Fighting', 'Racing'];

    $vertex = $graph->traverseGraph($vertices, 3);
        //dd($vertex);
    $genre_id = array(Genre::where('name', $vertex)->first()->id);

    $games = Game::whereNotNull('platforms')->whereNotNull('genres')->whereIn('genres', $genre_id)
    ->orderBy('rating','desc' )->limit(3)->get();

        foreach( $games as $game ){

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

                // $games = MyGame::whereIn('id', $games)->get()->all();

            }

            return view('Games.graph', compact('games'));
    }
}

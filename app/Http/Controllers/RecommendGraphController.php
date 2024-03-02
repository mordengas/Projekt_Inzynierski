<?php

namespace App\Http\Controllers;

use App\Models\MyGame;
use MarcReichel\IGDBLaravel\Models\Game;
use Illuminate\Http\Request;
use App\Models\Helpers\Graph;
use App\Models\GraphWeight;
use MarcReichel\IGDBLaravel\Models\Genre;
use Illuminate\Support\Facades\View;

class RecommendGraphController extends Controller{

    public function graph(Request $request){

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

    $vertices = $request->input('genres');
    //dd($vertices);
    $vertex = $graph->traverseGraph($vertices, (int)$request->range);
    //dd($vertex);
    $genre_id = array(Genre::where('name', $vertex)->first()->id);

    // $searchPlatforma ='% '.$request->platforma.' %';
    // $searchYear = "$request->rok_wydania-01-01 00:00:00";
    $platforma[] = (int)$request->platforma;
    $rok = (int)$request->rok_wydania;

    $games = Game::whereNotNull('platforms')->whereNotNull('genres')
    ->whereIn('genres', $genre_id)
    ->whereIn('platforms', $platforma)
    ->whereYear('first_release_date', '>=', $rok)
    ->orderBy('rating', 'desc')->limit(20)->get();

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
            $gamesWithScores = MyGame::getGamesWithMeanScores();

            $gameResults = [];
            foreach($mygames as $mygame){
                foreach($gamesWithScores as $gameWithScore){
                    if($mygame['id'] === $gameWithScore['game_id']){
                        if($gameWithScore['mean_score'] !== null){
                            $gameResults[] = [
                                'id' => $mygame['id'],
                                'final_score' => ($mygame['rating'] * 0.7) + ($gameWithScore['mean_score'] * 20 * 0.3)
                            ];
                        }else{
                            $gameResults[] = [
                                'id' => $mygame['id'],
                                'final_score' => $mygame['rating']
                            ];
                        }
                    }
                }
            }

            usort($gameResults, function ($game1, $game2) {
                // Ensure final_score is a number for comparison
                $finalScore1 = (float) $game1['final_score'];
                $finalScore2 = (float) $game2['final_score'];

                // Sort in descending order based on final_score
                return $finalScore2 <=> $finalScore1;
            });

            $top3Games = array_slice($gameResults, 0, 3);
            $ids = array_column($top3Games, 'id');

            $recommendedGames = MyGame::whereIn('id', $ids)->get()->all();


        return view('recommend')->with('games', $recommendedGames)->with('activeTab', 'content3');

    }
}

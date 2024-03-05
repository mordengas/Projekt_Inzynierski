<?php

namespace App\Http\Controllers;


use App\Models\GraphWeight; // Import the MyGame class
use App\Models\Helpers\Graph;


class RecommendController extends Controller
{
    public function index()
    {
        // $genres = [
        //     'Fighting',
        //     'Shooter',
        //     'Music',
        //     'Platform',
        //     'Puzzle',
        //     'Racing',
        //     'Real Time Strategy (RTS)',
        //     'Role-playing (RPG)',
        //     'Simulator',
        //     'Sport',
        //     'Strategy',
        //     'Turn-based strategy (TBS)',
        //     'Tactical',
        //     'Quiz/Trivia',
        //     "Hack and slash/Beat 'em up",
        //     'Pinball',
        //     'Adventure',
        //     'Arcade',
        //     'Visual Novel',
        //     'Indie',
        //     'Card & Board Game',
        //     'MOBA',
        //     'Point-and-click',
        //   ];


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

        return view('recommend')->with('graph', $graph);
    }

}

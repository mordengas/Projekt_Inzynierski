<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MarcReichel\IGDBLaravel\Enums\Image\Size;
use MarcReichel\IGDBLaravel\Models\Game;
use MarcReichel\IGDBLaravel\Models\Cover;
use App\Models\MyGame;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentDate = date('Y-m');
        $games = Game::whereNotNull('platforms')->whereNotNull('genres')
        ->where('first_release_date', '>=', $currentDate)
        ->orderBy('rating', 'desc')->limit(3)->get();

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

        return view('home')->with('games', $mygames);
    }


    public static function getUrl($game)
    {
        $cover = Cover::find((int)$game->cover);
        if ($cover != null) {
            return $cover->getUrl(Size::SCREENSHOT_BIG, true);
        }
        return "No URL available for the game with ID: ";
    }
}

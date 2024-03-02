<?php
namespace App\Http\Controllers;

use App\Models\MyGame;
use Illuminate\Http\Request;
use MarcReichel\IGDBLaravel\Enums\Image\Size;
use MarcReichel\IGDBLaravel\Models\Game;
use MarcReichel\IGDBLaravel\Models\Cover;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class SearchController extends Controller
{

    public function index()
    {
        return view('games');
    }

    public function store(Request $request)
    {
        $title = $request->input('title');

        $games = Game::whereNotNull('platforms')->whereNotNull('genres')->search($title)->orderByDesc('rating_count')->limit(100)->get();

        if(count($games) === 0){
            return view('games')->with('error', "No games with given title.");
        }else{

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

            // $searchResults = MyGame::search($title)->orderBy('ratingc','desc')->paginate(20);
            $searchResults = MyGame::where('name', 'like', '%' . $title . '%')
            ->orderByRaw('CASE WHEN "ratingc" = "no data available" THEN 0 ELSE 1 END DESC, "ratingc" ASC')
            ->get()->take(20);

            return view('games')->with('games', $searchResults);
        }


    }



public static function getUrl($game)
{
    $cover = Cover::find((int)$game->cover);
    if ($cover != null) {
        return $cover->getUrl(Size::COVER_BIG);
    }
    return "No URL available for the game with ID: ";
}

}

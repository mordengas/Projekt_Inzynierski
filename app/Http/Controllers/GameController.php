<?php
namespace App\Http\Controllers;

use App\Models\MyGame;
use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;
use MarcReichel\IGDBLaravel\Models\Game;

class GameController extends Controller
{

    public function index(){
        $games = MyGame::all();
        return view('admin.myGames.index', compact('games'))->with('view','admin');
    }
    public function destroy($id)
    {
        // Find the MyGame instance
        $myGame = MyGame::find($id);

        if (!$myGame) {
            // Handle the case when the MyGame is not found
            // You can redirect or return an error response
        }

        // Delete the MyGame instance
        $myGame->delete();

        // Redirect to the index method to display the remaining MyGames
        return redirect()->route('games.index');

    }

    public function showGame($id)
    {
        $game = MyGame::find($id);

        if (!$game) {

            $searchedGame =  Game::find((int)$id);

            MyGame::firstOrCreate([
                'id' => $searchedGame->id,
            ], [
                'name' => $searchedGame->name,
                'crating' => $searchedGame->aggregated_rating ?? "no data available",
                'cratingc' => $searchedGame->aggregated_rating_count ?? "no data available",
                'rating' => $searchedGame->rating ?? "no data available",
                'ratingc' => $searchedGame->rating_count ?? "no data available",
                'game_modes' => implode(" ", $searchedGame->game_modes ?? []),
                'genres' => implode(" ", $searchedGame->genres ?? []),
                'platforms' => implode(" ", $searchedGame->platforms ?? []),
                'release_date' => $searchedGame->first_release_date,
                'cover' => $searchedGame->cover ?? "no cover available",
                'description' => $searchedGame->summary ?? 'no description available',
            ]);

            $game = MyGame::find($id);
        }

        $comments = CommentController::getComments($game->id);

        return view('game', compact('game', 'comments'));
    }
}

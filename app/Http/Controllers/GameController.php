<?php
namespace App\Http\Controllers;

use App\Models\MyGame;
use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;
use MarcReichel\IGDBLaravel\Models\Game;

class GameController extends Controller
{
    public function show($id)
    {
        $game = MyGame::find($id);

        if (!$game) {

            $searchedGame =  Game::find((int)$id);

            $mygame = new MyGame;
            $mygame->name = $searchedGame->name;
            $mygame->id = $searchedGame->id;

            if( $searchedGame->aggregated_rating == null){
                $mygame->crating = "no data available";
                $mygame->cratingc = "no data available";

            }else{
                $mygame->crating = $searchedGame->aggregated_rating;
                $mygame->cratingc = $searchedGame->aggregated_rating_count;
            }

            if( $searchedGame->rating == null){
                $mygame->rating = "no data available";
                $mygame->ratingc = "no data available";

            }else{
                $mygame->rating = $searchedGame->rating;
                $mygame->ratingc = $searchedGame->rating_count;
            }
            unset($arr1);
            $arr1[] = $searchedGame->game_modes;
            $mygame->game_modes = implode(" ", $arr1[0]);

            unset($arr2);
            $arr2[] = $searchedGame->genres;
            $mygame->genres = implode(" ", $arr2[0]);

            unset($arr3);
            $arr3[] = $searchedGame -> platforms;
            $mygame->platforms = implode(" ", $arr3[0]);

            $mygame->release_date = $searchedGame -> first_release_date;

            if($searchedGame->cover != null){
            $mygame->cover = $searchedGame -> cover;
            }else{
                $mygame->cover = "no cover available";
            }
            $mygame -> save();

            $game = MyGame::find($id);
        }

        $comments = CommentController::getComments($game->id);

        return view('game', compact('game', 'comments'));
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\MyGame; // Import the MyGame class
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MarcReichel\IGDBLaravel\Models\Game;
use Illuminate\Support\Facades\View; // Import the View class from the correct namespace

class RecommendController extends Controller
{
    public function index()
    {
        // $user_id = Auth::user()->id;
        // $library = User::find($user_id)->library()->get();
        // $games = MyGame::whereIn('id', $library->pluck('game_id'))->get()->all();

        // dd(MyGame::getTopThreeGenres($games));
        return view('recommend');
    }

}

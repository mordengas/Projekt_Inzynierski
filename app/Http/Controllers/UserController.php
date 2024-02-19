<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\MyGame;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $library = Library::where('user_id', $user->id)->pluck('game_id')->toArray();
        $games = MyGame::whereIn('id', $library)->get()->all();

        return view('profile.profile', [
            'user' => $user,
            'games' => $games,
        ]);
    }
}

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

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Return a response
        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function update(Request $request)
    {
        // Find the user
        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|string|min:8',
        ]);

        // Update the user
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Return a response
        return response()->json(['message' => 'User updated successfully'], 200);
    }


    public function destroy(Request $request)
    {
        // Find the user
        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user
        $user->delete();

        // Return a response
        return response()->json(['message' => 'User deleted successfully'], 200);
    }

}

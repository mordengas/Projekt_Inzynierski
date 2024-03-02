<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\MyGame;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admin.users.index', compact('users'))->with('view','admin');
    }

    public function create()
    {
        return view('admin.users.create')->with('view','admin'); // Display user creation form
    }
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
            'description' => 'string'
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->description = $validatedData['description'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Return a response
        return redirect()->route('users.index')->with('success', 'User created successfully!');
        // response()->json(['message' => 'User created successfully'], 201);
    }

    public function edit(User $user)
    {
        // Pre-populate the user data in the form
        return view('admin.users.edit', compact('user'))->with('view','admin');
    }
    public function update(Request $request, $id)
    {
        // Find the user
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user_id = $user->id;
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user_id,
            'password' => 'string|min:8',
            'description' => 'nullable|string'
        ]);

        // Update the user
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->description = $validatedData['description'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Return a response
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
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

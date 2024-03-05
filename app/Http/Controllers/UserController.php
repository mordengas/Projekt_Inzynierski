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
            'description' => 'string|nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->description = $validatedData['description'];
        $user->password = bcrypt($validatedData['password']);

        if($request->input('isAdmin') !== null)
        {
            $user->role = 'admin';
        }else{
            $user->role = 'user';
        }

        if ($request->image !== null) {
            // Handle image upload
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;
            }

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

        // Validate the request data (excluding password if not provided)
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        if ($request->password !== null) {
            $rules['password'] = 'string|min:8';
        }

        if($request->input('isAdmin') !== null)
        {
            $user->role = 'admin';
        }else{
            $user->role = 'user';
        }

        $validatedData = $request->validate($rules);

        // Update the user
        $user->fill($validatedData);

        // Handle password update if provided
        if ($request->password !== null) {
            $user->password = bcrypt($validatedData['password']);
        }

        if ($request->image !== null) {
        // Handle image upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $user->image = $imageName;
        }else{
            if($request->input('deleteImage') !== null){
                $user->image = 'user.png';
            }
        }



        $user->save();

        // Return a response
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    public function destroy(Request $request, $id)
    {
        // Find the user
        $user = User::findOrFail($id);

        if (!$user) {
            return redirect()->route('users.index')->with('view','admin');
        }

        // Delete the user
        $user->delete();

        // Return a response
        return redirect()->route('users.index')->with('view','admin');
    }

}

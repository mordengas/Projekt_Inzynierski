<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Library;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $library = Library::where('user_id', $userId)->first();

        return view('user.show', compact('user', 'library'));
    }
}

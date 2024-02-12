<?php

namespace App\Http\Controllers;

use App\Models\Library;

class LibraryController extends Controller
{
    public function addGame($game_id, $user_id)
    {
        $library = Library::create([
            'user_id' => $user_id,
            'game_id' => $game_id
        ]);

        $library->save();

        return redirect()->back();
    }
}


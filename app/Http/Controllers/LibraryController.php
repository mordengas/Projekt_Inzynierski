<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{

    public function addGame(Request $request)
    {

        $validatedData = $request->validate([
            'game_id' => 'required',
            'user_id' => 'required',
        ]);

        $user_id = $validatedData['user_id'];
        $game_id = $validatedData['game_id'];

        $library = Library::create([
            'user_id' => $user_id,
            'game_id' => $game_id
        ]);

        $library->save();

        return redirect()->back();
    }

    public function setState(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required',
            'user_id' => 'required',
            'state' => 'required',
        ]);

        $game_id = $validatedData['game_id'];
        $user_id = $validatedData['user_id'];
        $state = $validatedData['state'];

        $library = Library::where('user_id', $user_id)
            ->where('game_id', $game_id)
            ->first();

        if ($library) {
            $library->state = $state;
            $library->save();
        } else {
            $library = Library::create([
                'user_id' => $user_id,
                'game_id' => $game_id,
                'state' => $state
            ]);

            $library->save();
        }

        return redirect()->back();
    }

    public function deleteGame(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required',
            'user_id' => 'required',
        ]);

        $game_id = $validatedData['game_id'];
        $user_id = $validatedData['user_id'];

        $library = Library::where('user_id', $user_id)
            ->where('game_id', $game_id)
            ->first();

        if ($library) {
            $library->delete();
        }

        return redirect()->back();
    }

    public function setOrUpdateScore(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required',
            'user_id' => 'required',
            'score' => 'required',
        ]);

        $game_id = $validatedData['game_id'];
        $user_id = $validatedData['user_id'];
        $score = $validatedData['score'];

        $library = Library::where('user_id', $user_id)
            ->where('game_id', $game_id)
            ->first();

        if ($library) {
            $library->score = $score;
            $library->save();
        } else {
            $library = Library::create([
                'user_id' => $user_id,
                'game_id' => $game_id,
                'score' => $score
            ]);

            $library->save();
        }

        return redirect()->back();

    }

public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'game_id' => 'required',
            'user_id' => 'required',
            'state' => 'required',
            'score' => 'required',
        ]);

        $game_id = $validatedData['game_id'];
        $user_id = $validatedData['user_id'];
        $state = $validatedData['state'];
        $score = $validatedData['score'];

        $library = Library::where('user_id', $user_id)
            ->where('game_id', $game_id)
            ->first();

        if ($library) {
            $library->state = $state;
            $library->score = $score;
            $library->save();
        } else {
            $library = Library::create([
                'user_id' => $user_id,
                'game_id' => $game_id,
                'state' => $state,
                'score' => $score
            ]);

            $library->save();
        }

        return redirect()->back();

    }

    public function destroy($id)
    {
        $library = Library::find($id);

        if ($library) {
            $library->delete();
        }

        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{

    public function index()
    {
        $libraries = Library::all(); // Fetch all libraries
        return view('admin.libraries.index', compact('libraries'))->with('view','admin');
    }

    public function create()
    {
        return view('admin.libraries.create')->with('view','admin');
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'game_id' => 'required|exists:my_games,id',
            'state' => 'nullable|in:completed,playing,plan to play',
            'score' => 'nullable|numeric|between:0,5',
        ]);

        // Create new library entry
        $library = new Library();
        $library->user_id = $validatedData['user_id'];
        $library->game_id = $validatedData['game_id'];

        if($request->state !== null){
            $library->state = $validatedData['state'];
        }

        if($request->score !== null){
            $library->score = $validatedData['score'];
        }

        // dd($library);

        $library->save();

        // Redirect to index page or wherever you want
        return redirect()->route('libraries.index')->with('message', 'Library entry created successfully!');
    }

    public function edit($id)
    {
        // Fetch library entry to edit
        $library = Library::findOrFail($id);
        return view('admin.libraries.edit', compact('library'))->with('view','admin');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'game_id' => 'required|exists:my_games,id',
            'state' => 'nullable|in:completed,playing,plan to play',
            'score' => 'nullable|numeric|between:0,5',
        ]);

        $game_id = $validatedData['game_id'];
        $user_id = $validatedData['user_id'];
        $state = $validatedData['state'];

        if($request->score !== null){
            $score = $validatedData['score'];
        }else{
            $score = null;
        }

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

        return redirect()->route('libraries.index')->with('message', 'Library entry updated successfully!');

    }

    public function destroy($id)
    {
        $library = Library::find($id);

        if ($library) {
            $library->delete();
        }

        return redirect()->back();
    }



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

}

<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $likes = Like::all();
        return view('admin.likes.index', compact('likes'))->with('view','admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.likes.create')->with('view','admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'user_id' => 'required|exists:users,id',
            'comment_id' => 'required|exists:comments,id',
        ]);

        $like = new Like();
        $like->user_id = $validatedDate['user_id'];
        $like->comment_id = $validatedDate['comment_id'];
        $like->save();

        return redirect()->route('likes.index')->with('message', 'Like created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $like = Like::findOrFail($id);
        return view('admin.likes.edit', compact('like'))->with('view','admin');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedDate = $request->validate([
            'user_id' => 'required|exists:users,id',
            'comment_id' => 'required|exists:comments,id',
        ]);

        $like = Like::findOrFail($id);
        $like->user_id = $validatedDate['user_id'];
        $like->comment_id = $validatedDate['comment_id'];
        $like->save();

        return redirect()->route('likes.index')->with('message', 'Like updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $like = Like::find($id);

        if($like){
            $like->delete();
        }

        return redirect()->back();
    }

    public function toggle(Request $request)
    {
        $validatedData = $request->validate([
            'comment_id' => 'required',
        ]);

        $user = auth()->user();

        // Check if user has already liked the comment
        $existingLike = Like::where('user_id', $user->id)
                        ->where('comment_id', $validatedData['comment_id'])
                        ->first();
        if ($existingLike) {
            // Unlike the comment
            $existingLike->delete();
        } else {
            // Like the comments
            Like::create([
                'user_id' => $user->id,
                'comment_id' => $validatedData['comment_id'],
            ]);
        }

        return redirect()->back();
    }

}

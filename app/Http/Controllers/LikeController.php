<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Comment;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
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

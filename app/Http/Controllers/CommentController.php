<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public static function getComments($id)
    {
        $comments = Comment::where('game_id', $id)->get();
        return $comments;
    }

    public function store(Request $request)
    {
        if(auth()->check()){
        // Validate the request data
        $validatedData = $request->validate([
            'content' => 'required|string',
            'user_id' => 'required|integer',
            'game_id' => 'required|integer',
        ]);

        // Create a new comment instance
        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->user_id = $validatedData['user_id'];
        $comment->game_id = $validatedData['game_id'];
        $comment->date = now();

        // Save the comment to the database
        $comment->save();
        }
        // Return a response or redirect to a success page
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        // Check if the comment exists
        if ($comment) {
            // Delete the comment
            $comment->delete();

            // Return a response or redirect to a success page
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        } else {
            // Return a response or redirect to an error page
            return redirect()->back()->with('error', 'Comment not found.');
        }

    }


}

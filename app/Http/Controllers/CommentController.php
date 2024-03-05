<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'))->with('view','admin');
    }


    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comments.edit', compact('comment'))->with('view','admin');
    }

    public function create()
    {
        return view('admin.comments.create')->with('view','admin');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'game_id' => 'required|exists:my_games,id',
        ]);

        // Create a new comment instance
        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->user_id = $validatedData['user_id'];
        $comment->game_id = $validatedData['game_id'];
        $comment->date = now();

        // Save the comment to the database
        $comment->save();

        // Return a response or redirect to a success page
        return redirect()->route('comments.index')->with('message', 'Comment created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'game_id' => 'required|exists:my_games,id',
            'content' => 'required|string|max:255',
        ]);

        $comment = Comment::findOrFail($id);

        $comment->content = $validatedData['content'];
        $comment->user_id = $validatedData['user_id'];
        $comment->game_id = $validatedData['game_id'];
        $comment->date = now();

        $comment->save();

        return redirect()->route('comments.index')->with('message', 'Comment updated successfully.');
    }


    public static function getComments($id)
    {
        $comments = Comment::where('game_id', $id)->get();
        return $comments;
    }

    public function addcomment(Request $request)
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

    public function destroy($id)
    {
        // Check if the comment exists
        $comment = Comment::findOrFail($id);
        if (!$comment) {
            return redirect()->route('comments.index')->with('view','admin');
        }

        $comment->delete();
        return redirect()->route('comments.index')->with('view','admin')->with('message', 'Comment deleted successfully.');
    }


}

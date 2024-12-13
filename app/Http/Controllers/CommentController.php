<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'commenting' => 'required|max:255',
        'post_id' => 'required|numeric',
    ]);

    $c = new Comment;
    $c->commenting = $validatedData['commenting'];
    $c->post_id = $validatedData['post_id'];
    $c->user_id = auth()->id(); // Automatically associate the logged-in user

    // Save the comment to the database
    $c->save();

    session()->flash('message', 'Comment was created.');
    return redirect()->route('posts.show', $validatedData['post_id']);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index')->with('message',
        'Comment was deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_content' => 'required|max:255',
            'song_id' => 'required|numeric',
        ]);
    
        $p = new Post;
        $p->post_content = $validatedData['post_content'];
        $p->song_id = $validatedData['song_id'];
    
        // Ensure the user is authenticated and assign their ID
        if (auth()->check()) {
            $p->user_id = auth()->id();
        } else {
            abort(403, 'User not authenticated.');
        }
    
        $p->save();
    
        session()->flash('message', 'Post was created.');
        return redirect()->route('posts.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
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
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('message',
        'Post was deleted.');
    }
}

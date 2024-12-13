<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
    
        $profile = new Profile;
        $profile->name = $validatedData['name'];
        $profile->user_id = Auth::id(); // Assign the currently logged-in user's ID
        $profile->save();
    
        session()->flash('message', 'Profile was created.');
        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::findOrFail($id);
    
        // Check if the profile has a user
        if ($profile->user) {
            $user = $profile->user;
            $posts = $user->posts;
            $comments = $user->comments;
        } else {
            // Handle the case where there is no associated user (for example, show an error message or redirect)
            return redirect()->route('profiles.index')->with('error', 'User not found for this profile.');
        }
    
        return view('profiles.show', compact('user', 'posts', 'comments'));
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
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profiles.index')->with('message',
        'Profile was deleted.');
    }
}

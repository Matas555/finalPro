<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // dd($request->all()); 
        
     $validatedData = $request->validate([
        'name' => 'required|max:255',
        'monthly_listeners' => 'required|numeric',
     ]);

    $a = new Artist;
    $a->name = $validatedData['name'];
    $a->monthly_listeners = $validatedData['monthly_listeners'];
    $a->save();

    session()->flash('message', 'Artist was created.');
    return redirect()->route('artists.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.show', ['artist' => $artist]);
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
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return redirect()->route('artists.index')->with('message',
        'Artist was deleted.');
    }
}

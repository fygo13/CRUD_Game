<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Developer;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::with('developer')->get();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $developers = Developer::all();
        return view('games.create', compact('developers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'developer_id' => 'required',
        ]);

        Game::create($request->all());
        return redirect()->route('games.index')->with('success', 'Game ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $developers = Developer::all();
        return view('games.edit', compact('game', 'developers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'developer_id' => 'required',
        ]);

        $game->update($request->all());
        return redirect()->route('games.index')->with('success', 'Game diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game dihapus!');
    }
}

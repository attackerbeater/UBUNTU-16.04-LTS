<?php

namespace App\Http\Controllers\Players;

use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('players.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'sport' => 'required|max:255',
            'country' => 'required|max:255',
        ]);

        // $player = new Player(); 
        // $player->name = request('name');
        // $player->sport = request('sport');
        // $player->country = request('country');
        // $player->save();

        // not this approach requires fillable property to allow mass assignment on [App\Player]
        Player::create($validatedData);
 
        return redirect('/players');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $player = Player::findOrFail($player->id);
        return view('players.show',compact('player')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $players = Player::findOrFail($player->id);
        return view('players.edit',compact('players')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player = Player::findOrFail($player->id);
 
        $player->name = request('name');
        $player->sport = request('sport');
        $player->country = request('country');
 
        $player->save();
 
        return redirect('/players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        Player::findOrFail($player->id)->delete();
        return redirect('/players');
    }
}

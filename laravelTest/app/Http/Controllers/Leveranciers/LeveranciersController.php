<?php

namespace App\Http\Controllers\Leveranciers;

use App\Leveranciers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LeveranciersController extends Controller
{
    public function __construct(\App\Leveranciers\Repository $leveranciers){
        $this->leveranciers = $leveranciers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {             
        return response()->json($this->leveranciers->getList()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/leveranciers/create')->with('getById', 2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreLeveranciers $request)
    {
        $this->leveranciers->save($request);
        return redirect('/admin/leveranciers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leveranciers  $leveranciers
     * @return \Illuminate\Http\Response
     */
    public function show(Leveranciers $leveranciers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leveranciers  $leveranciers
     * @return \Illuminate\Http\Response
     */
    public function edit(Leveranciers $leveranciers)
    {
        throw new \App\Exceptions\ActionNotCompletedException();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leveranciers  $leveranciers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leveranciers $leveranciers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leveranciers  $leveranciers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leveranciers $leveranciers)
    {
        //
    }


    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function getById(Leveranciers $leveranciers){
        return response()->json($this->leveranciers->getById($leveranciers));
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Questions;
use App\Http\Resources\Questions as QuestionsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Questions::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leveranciers  $leveranciers
     * @return \Illuminate\Http\Response
     */
    public function show(Leveranciers $leveranciers)
    {
        $poll = Questions::find($id);
        
        if(is_null($poll)){
            return response()->json(null, 404);
        }

        $response = new QuestionsResource(Questions::findOrFail($id), 200);
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leveranciers  $leveranciers
     * @return \Illuminate\Http\Response
     */
    public function edit(Leveranciers $leveranciers)
    {
        //
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
}

<?php

namespace App\Http\Controllers\Api;

use App\Leveranciers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeveranciersController extends Controller
{
    public function index(){
        return response()->json(Leveranciers::get(), 200);
    }

    public function show($id){
        return response()->json(Leveranciers::find($id), 200);
    }

    public function store(Request $request){
        $leveranciers = Leveranciers::create($request->all());
        return response()->json($leveranciers, 201); // 201 is for when we have a whole object
    }

    public function update(Request $request, Leveranciers $leveranciers){
        $leveranciers->update($request->all());
        return response()->json($leveranciers, 200); // 200 were creating a new object, we're not actually creaing a new leveranciers
    }

    public function delete(Request $request, Leveranciers $leveranciers){
        $leveranciers->delete();
        return response()->json($leveranciers, 204); // 204 status code for no response
    }
}

<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;
use App\Http\Resources\Poll as PollResource;
use Validator;

class PollsController extends Controller
{
    public function index(){
    	return response()->json(Poll::get(), 200);
    }

    public function show($id){
    	$poll = Poll::find($id);
    	
    	if(is_null($poll)){
    		return response()->json(null, 404);
    	}

    	$response = new PollResource(Poll::findOrFail($id), 200);
    	return response()->json($response, 200);
    }

    public function store(Request $request){

    	$rules = [
    		'title' => 'required|max:10',
    	]; 

    	$validator = Validator::make($request->all(), $rules);
    	if($validator->fails()){
    		return response()->json($validator->errors(), 400); // 404 bad request
    	}

    	$poll = Poll::create($request->all());
    	return response()->json($poll, 201); // 201 is for when we have a whole object
    }

    public function update(Request $request, Poll $poll){
    	$poll->update($request->all());
    	return response()->json($poll, 200); // 200 were creating a new object, we're not actually creating a new poll
    }

    public function delete(Request $request, Poll $poll){
    	$poll->delete();
    	return response()->json($poll, 204); // 204 status code for no response
    }

    public function errors(){
    	return response()->json(['message' => 'Payment is required'], 501);
    }

    public function questions(Request $request, Poll $poll){
    	$questions = $poll->questions;
    	return response()->json($questions, 200);
    }
}

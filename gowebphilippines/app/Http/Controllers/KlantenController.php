<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Klanten;
use App\Leveranciers;
use App\Orders;
use App\Http\Controllers\Controller;
use Validator;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;

class KlantenController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(\App\Klanten\Repository $repo) {
        $this->middleware('auth');
        $this->klanten = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      return $this->klanten->getIndex();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
      return $this->klanten->postStore($request);      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
      return $this->klanten->getShow($id);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
      return $this->leveranciers->getEdit($id);    
    }
   
    public function update(Request $request, $id) {
      return $this->klanten->getUpdate($request, $id);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
      return $this->klanten->getDestroy($id);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateId(Request $request, $id) {
      return $this->klanten->getUpdateId($id);              
    }

}

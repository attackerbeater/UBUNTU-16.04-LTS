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

class KlantenController extends Controller

{

  /**

  * Create a new controller instance.

  *

  * @return void

  */

  public function __construct()

  {

    $this->middleware('auth');

  }

  /**

  * Display a listing of the resource.

  *

  * @return \Illuminate\Http\Response

  */

  public function index()

  {

    $klantens = DB::table('klantens')->orderBy('id', 'desc')->get();

    return view('klanten', ['klantens' => $klantens]);

  }

  /**

  * Store a newly created resource in storage.

  *

  * @param  \Illuminate\Http\Request  $request

  * @return \Illuminate\Http\Response

  */

  public function store(Request $request)

  {

    $validator = Validator::make($request->all() , [

      'company_name'          => 'required',

      // 'company_number'        => 'required|regex:/^[a-zA-Z0-9]+$/u',

      'company_country'       => 'required',

      'company_city'          => 'required',

      'company_zip'           => 'required',

      "company_email"         => 'required|email',

    ]);

    if ($validator->passes())

    {

      $klanten = new klanten;

      $klanten->company_name                  = $request->input('company_name');

      $klanten->company_street                = $request->input('company_street')? $request->input('company_street'):'';

      $klanten->company_country               = $request->input('company_country');

      $klanten->company_city                  = $request->input('company_city');

      $klanten->company_zip                   = $request->input('company_zip');

      $klanten->ban                           = $request->input('ban');

      $klanten->vn                            = $request->input('vn');

      $klanten->company_email                 = $request->input('company_email');

      $klanten->company_telephone             = $request->input('company_telephone');

      $klanten->company_general_fax           = $request->input('company_general_fax')? $request->input('company_general_fax'):'';

      $klanten->company_sector                = $request->input('company_sector')? $request->input('company_sector'):'';

      $klanten->contact_first_name            = $request->input('contact_first_name')? $request->input('contact_first_name'):'';

      $klanten->contact_lastname              = $request->input('contact_lastname')? $request->input('contact_lastname'):'';

      $klanten->contact_email                 = $request->input('contact_email')? $request->input('contact_email'):'';

      $klanten->contact_telephone             = $request->input('contact_telephone')? $request->input('contact_telephone'):'';

      $klanten->contact_function              = $request->input('contact_function')? $request->input('contact_function'):'';

      $klanten->contact_person_last_name      = $request->input('contact_person_last_name.*') ? implode(',', $request->input('contact_person_last_name.*')) : '';

      $klanten->contact_person_first_name     = $request->input('contact_person_first_name.*') ? implode(',', $request->input('contact_person_first_name.*')) : '';

      $klanten->contact_person_function       = $request->input('contact_person_function.*') ? implode(',', $request->input('contact_person_function.*')) : '';

      $klanten->contact_person_email          = $request->input('contact_person_email.*') ? implode(',', $request->input('contact_person_email.*')) : '';

      $klanten->contact_person_telephone      = $request->input('contact_person_telephone.*') ? implode(',', $request->input('contact_person_telephone.*')) : '';

      $klanten->save();

      return response()->json(['success' => 'Added new records.']);

    }

    return response()

    ->json(['error' => $validator->errors()

    ->toArray() ]);

  }

  /**

  * Display the specified resource.

  *

  * @param  int  $id

  * @return \Illuminate\Http\Response

  */

  public function show($id)

  {

    $klantens = Klanten::find($id);

    $related_orders = Orders::leftJoin('klantens', 'klantens.id', 'orders.client_id')
    ->where('orders.client_id', $id)
    ->select('orders.id', 'client_id', 'order_reference_number', 'order_clients', 'order_supplier', 'order_status', 'orders.updated_at')->get();

    if (count($related_orders)>0)

    {

      $leveranciers = DB::table('leveranciers')->where('leveranciers.supplier_name', $related_orders[0]->order_supplier)->get();

      return view('klanten_view', compact('klantens', 'related_orders', 'leveranciers'));

    }

    else

    {

      return view('klanten_view', compact('klantens', 'related_orders'));

    }

  }

  /**

  * Show the form for editing the specified resource.

  *

  * @param  int  $id

  * @return \Illuminate\Http\Response

  */

  public function edit($request, $id)
  {

    $klantens = Klanten::find($id);

    // $logs = $request->session()->all();

    // //Save string to log, use FILE_APPEND to append.
    // file_put_contents('./log_'.date("j.n.Y").'.log', $logs, FILE_APPEND);

    return view('klanten_edit', ['klantens' => $klantens]);

  }

  /**

  * Update the specified resource in storage.

  *

  * @param  \Illuminate\Http\Request  $request

  * @param  int  $id

  * @return \Illuminate\Http\Response

  */

  public function updateId(Request $request, $id)
  {
      $validator = Validator::make($request->all() , []);

      if ($validator->passes()) 
      {

        $data['id'] = $request->input('id');
        
        Klanten::where('id', $id)->update($data);
      }
  }

  public function update(Request $request, $id)
  {

    $validator = Validator::make($request->all() , [

      // 'company_name'          => 'required',

      // // 'company_number'        => 'required|regex:/^[a-zA-Z0-9]+$/u',

      // 'company_country'       => 'required',

      // 'company_city'          => 'required',

      // 'company_zip'           => 'required',

      // 'ban'                   => 'required',

      // 'vn'                    => 'required',

      // "company_email"         => 'required|email',

      // "company_telephone"     => 'required'

    ]);

    if ($validator->passes())

    {

      $data['company_name']                   = $request->input('company_name');

      $data['company_street']                 = $request->input('company_street')? $request->input('company_street'):'';

      $data['company_country']                = $request->input('company_country');

      $data['company_city']                   = $request->input('company_city');

      $data['company_zip']                    = $request->input('company_zip');

      $data['ban']                            = $request->input('ban');

      $data['vn']                             = $request->input('vn');

      $data['company_email']                  = $request->input('company_email');

      $data['company_telephone']              = $request->input('company_telephone');

      $data['company_general_fax']            = $request->input('company_general_fax')? $request->input('company_general_fax'):'';

      $data['company_sector']                 = $request->input('company_sector')? $request->input('company_sector'):'';

      $data['contact_first_name']             = $request->input('contact_first_name')? $request->input('contact_first_name'):'';

      $data['contact_lastname']               = $request->input('contact_lastname')? $request->input('contact_lastname'):'';

      $data['contact_email']                  = $request->input('contact_email')? $request->input('contact_email'):'';

      $data['contact_telephone']              = $request->input('contact_telephone')? $request->input('contact_telephone'):'';

      $data['contact_function']               = $request->input('contact_function')? $request->input('contact_function'):'';

      $data['contact_person_first_name']  = $request->input('contact_person_first_name')? implode(',', $request->input('contact_person_first_name.*')):'';

      $data['contact_person_last_name']   = $request->input('contact_person_last_name')?implode(',', $request->input('contact_person_last_name.*')):'';

      $data['contact_person_email']       = $request->input('contact_person_email')?implode(',', $request->input('contact_person_email.*')):'';

      $data['contact_person_telephone']   = $request->input('contact_person_telephone')?implode(',', $request->input('contact_person_telephone.*')):'';

      $data['contact_person_function']    = $request->input('contact_person_function')?implode(',', $request->input('contact_person_function.*')):'';

      Klanten::where('id', $id)->update($data);

      return redirect()->back()

      ->with('success', 'Record has been updated.');

    }

    return redirect()

    ->back()

    ->withErrors($validator->errors()

    ->toArray());

  }

  /**

  * Remove the specified resource from storage.

  *

  * @param  int  $id

  * @return \Illuminate\Http\Response

  */

  public function destroy($id)

  {

    Klanten::where('id', $id)->delete();

    return redirect()->back()->with('message', 'client id: ' . $id . ' has been deleted');

  }

}


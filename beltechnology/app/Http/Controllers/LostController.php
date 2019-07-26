<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
use App\klanten;
use App\Leveranciers;
use App\Http\Controllers\Controller;
use Validator;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Mail\quoteSentToClient;
use DateTime;

class LostController extends Controller
{
  //
  public function init(Request $request, $id){

    $data['order_status'] = $request->order_status;
    DB::table('orders')->where("id", $id)->update($data);

    return response()->json(['success' => true]);

  }

}

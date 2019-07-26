<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klanten;
use App\Leveranciers;
use App\Orders;

use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
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
  
  public function index()
  {    
    $count_klantens     = DB::table('klantens')->count();
    $count_leveranciers = DB::table('leveranciers')->count();
    $count_orders       = DB::table('orders')->count();
    return view('admin.dashboard', [
      'count_klantens'        => $count_klantens,
      'count_leveranciers'    => $count_leveranciers,
      'count_orders'          => $count_orders
    ]);
  }
}

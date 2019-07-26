<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Orders;
use App\Http\Controllers\Controller;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Beltech\Orders\OrdersAbstractHandler;

class StatusFourController extends Controller
{

    const STATUS = '5.QUOTE ACCEPTANCE from CLIENT';
    protected $abstractOrders;

    function __construct(OrdersAbstractHandler $abstractOrders){
        $this->abstractOrders = $abstractOrders;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = self::STATUS;
				$this->abstractOrders->submitIgnorePdf($request, $id, $status);
    }
}

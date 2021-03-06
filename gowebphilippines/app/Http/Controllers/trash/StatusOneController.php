<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Beltech\Orders\OrdersAbstractHandler;

class StatusOneController extends Controller
{

		const STATUS = '2.QUOTE REQUEST SENT to SUPPLIER';
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

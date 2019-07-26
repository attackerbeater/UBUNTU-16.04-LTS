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

class StatusThreeController extends Controller
{

    const STATUS = '3.QUOTE SUPPLIER RECEIVED';
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

        // $validator = Validator::make($request->all() , []);
        //
        // if ($validator->passes())
        // {
        //    $data = $this->abstractOrders->orderStatusThreeUpdateRequest($request, $id);
        //    if(!isset($_POST['statusTreeAppend'])){
        //        $data['order_status'] = self::STATUS;
        //    }
        //    Orders::where('id', $id)->update($data);
        //    return response()->json(['success' => true]);
        // }
        //
        // return response()->json(['error' => $validator->errors()->toArray() ]);
    }


}

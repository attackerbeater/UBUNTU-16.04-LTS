<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
use App\Klanten;
use App\Leveranciers;
use App\OrderTreatment;
use App\OrderTreatmentDetails;
use App\OrderTreatmentPrice;
use App\Http\Controllers\Controller;
use Validator;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\libs\Email\InterfaceEmail as InterfaceEmail;
use App\Beltech\Orders\OrderFunctionHandler;

class StatusOneGeneratePDFController extends Controller
{
    protected $handler;

    // for app\libs\email\EmailHandler properties
    const STATUS = '2.QUOTE REQUEST SENT to SUPPLIER';
    protected $emailobj = 'quote-request-sent-to-supplier';
    protected $path = 'supplier';
    protected $transport;
    protected $column = 'upload_quote_request_sent_to_supplier';

    public function __construct(InterfaceEmail $t, OrderFunctionHandler $handler){
        $this->transport = $t;
        $this->handler = $handler;
    }

    public function generatepdf(Request $request, $id, $supplier_name, $row_num, $column_num)
    {
        // note: error accured bcoz the supplier name doesn't exist
        $supplier = DB::table('leveranciers')->select('*')->where('supplier_name', $supplier_name)->get();

        if(count($supplier)>0){

            $order = DB::table('orders')->select('*')->where('order_supplier', $supplier[0]->supplier_name)->where('id', $id)->get();

            $data['order_id'] = $id;
            $data['row_num'] = $row_num;
            $data['column_num'] = $column_num;

            $data['supplier_name'] = $supplier[0]->supplier_name;
            $data['supplier_email'] = $supplier[0]->supplier_email;

            $newArr = $this->handler->processOrder($id);

            return view('quotation.one.quote-request-sent-to-supplier', compact('data', 'supplier', 'order', 'newArr'));
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        return $this->transport->email($request, self::STATUS, $this->emailobj, $this->path, $this->column);
    }
}

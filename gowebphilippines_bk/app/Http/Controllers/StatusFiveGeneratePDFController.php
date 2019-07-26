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

use App\libs\Email\InterfaceEmail as InterfaceEmail;
use App\Beltech\Orders\OrderFunctionHandler;
class StatusFiveGeneratePDFController extends Controller
{
    protected $handler;

    // for app\libs\email\EmailHandler properties
    protected $status = '6.SEND CONFIRMATION TO SUPPLIER';
    protected $emailobj = 'send-confirmation-to-supplier';
    protected $path = 'supplier';
    protected $transport;
    protected $column = 'upload_send_confirmation_to_supplier';

    public function __construct(InterfaceEmail $t, OrderFunctionHandler $handler){
        $this->transport = $t;
        $this->handler = $handler;
    }

    public function generatepdf(Request $request, $id, $supplier_name)
    {
        $supplier = DB::table('leveranciers')->select('*')->where('supplier_name', $supplier_name)->get();
        $order = DB::table('orders')->select('*')->where('order_supplier', $supplier_name)->where('id', $id)->get();

        $data['order_id'] = $id;
        $data['supplier_name'] = $supplier[0]->supplier_name;
        $data['supplier_email'] = $supplier[0]->supplier_email;

        $client = DB::table('klantens')
            ->select('*')
            ->where('id', $order[0]->client_id)
            ->get();

        $newArr = $this->handler->processOrder($id);

        return view('quotation.five.send-confirmation-to-supplier', compact('data', 'supplier', 'order', 'client', 'newArr'));
    }

    /**
     * Sends Email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        return $this->transport->email($request, $this->status, $this->emailobj, $this->path, $this->column);
    }

}

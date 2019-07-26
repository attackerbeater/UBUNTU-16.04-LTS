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
use PDF;

class StatusTenGeneratePDFController extends Controller
{
    // for app\libs\email\EmailHandler properties
    protected $status = '11.GOODS SENT to CLIENT';
    protected $emailobj = 'goods-sent-to-client';
    protected $path = 'client';
    protected $transport;
    protected $column = 'upload_goods_sent_to_client';

    public function __construct(InterfaceEmail $t){
        $this->transport = $t;
    }

    public function generatepdf(Request $request, $id)
    {
        $orders = Orders::leftJoin('klantens', 'klantens.id', 'orders.client_id')->where('orders.id', $id)->select('*')->first();

        $orid = $orders['client_id'];
        $sub_total = Orders::where('id', $id)->sum(\DB::raw('(orders.order_amount) * (orders.order_qty)'));

        if ($request->has('download'))
        {
            $pdf = \PDF::loadView('quotation.statusNineTenElevenTwelve.pdf.generate-delivery-document', compact('orders', 'sub_total') , array(
                'pdf' => true
            ));
            return $pdf->download('generate-delivery-document.pdf');
        }

        $orders['order_id'] = $id;
        return view('quotation.ten.goods-sent-to-client', compact('orders', 'sub_total', 'order_id') , array(
            'pdf' => false
        ));
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

<?phpnamespace App\Http\Controllers;use Illuminate\Http\Request;use App\Http\Requests;use App\Orders;use App\klanten;use App\Leveranciers;use App\Http\Controllers\Controller;use Validator;// use App\Http\Controllers\DB;use Illuminate\Support\Facades\DB;use Illuminate\Support\Facades\Redirect;use PDF;use App\libs\Email\InterfaceEmail as InterfaceEmail;use App\Beltech\Orders\OrderFunctionHandler;class StatusThirteenGenerateInvoiceController extends Controller{    protected $handler;    // for app\libs\email\EmailHandler properties    protected $status = '14.INVOICE PAID';    protected $emailobj = 'invoice-sent';    protected $path = 'client';    protected $transport;    protected $column = 'upload_invoice_paid';    public function __construct(InterfaceEmail $t, OrderFunctionHandler $handler){        $this->transport = $t;        $this->handler = $handler;    }    public function generateInvoice(Request $request, $id)    {        $orders = Orders::leftJoin('klantens', 'klantens.id', 'orders.client_id')->where('orders.id', $id)->select('*')->first();        $orid = $orders['client_id'];        $order_id = DB::table('orders')->select('id')->where('client_id', $orid)->get();        $sub_total = Orders::where('id', $id)->sum(\DB::raw('(orders.order_amount) * (orders.order_qty)'));        if ($request->has('download'))        {            $pdf = \PDF::loadView('quotation.generateInvoice.pdf.generate-invoice', compact('orders', 'sub_total') , array(                'pdf' => true            ));            return $pdf->download('generate-invoice.pdf');        }        $orders['order_id'] = $id;        // set default price to avoid errors        $transport_price = $orders['transport_price'] ?  $orders['transport_price']: '00.0';        $products = $this->handler->processOrder($id);        return view('quotation.thirteen.invoice-sent', compact('orders', 'sub_total', 'order_id', 'id', 'products', 'transport_price'));        }    public function process(Request $request)    {        return $this->transport->email($request, $this->status, $this->emailobj, $this->path, $this->column);    }}
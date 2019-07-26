<?php
namespace App\Beltech\Pdf;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
use Illuminate\Support\Facades\DB;
use DateTime;

class PdfFunctionHandler {

	/**
	 * [protected description]
	 * @var [type]
	 */
	protected $_now;

	function __construct(){
		$this->_now = new DateTime;
	}
	
  /**
	 * Upload the file from order status popup
	 * 
	 * @param  [type] $name      the name of the file upload 
	 * @param  [type] $dataindex the index name for data array
	 * @param  [type] $path      either client / supplier
	 * @return [type]            [description]
	 */
	public function uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column){					
		if($name){						
			$data[$dataindex] = str_replace(' ', '_', $name->getClientOriginalName());
			if ($data[$dataindex]){
				$name->move(storage_path() . "/{$path}/{$id}-{$client_id}", $data[$dataindex]);
				// $data[$dataindex]    = "storage/{$path}/{$id}-{$client_id}/" . $data[$dataindex];
				$data[$dataindex]   = $data[$dataindex];
				$data[$column]   = $this->_now;
			}
		
			return $data;
		}					
	}					
}

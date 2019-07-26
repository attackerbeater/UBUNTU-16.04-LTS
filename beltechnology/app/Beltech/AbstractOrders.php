<?php

namespace App\Beltech;
use  App\Beltech\AbstractPdf;
abstract class AbstractOrders extends AbstractPdf {


	// public abstract function orderStatusPostRequest($request, $hasfile, $path, $id);

	// public abstract function orderStatusUploadRequest($request, $hasfile,$path, $column, $orders, $id);

	// public abstract function orderProductLists($id);
  
  public abstract function orderProductLists($id);
  public abstract function orderProductListsNoPrice($id);

}

<?php

namespace App\Beltech;

abstract class AbstractPdf {
  public abstract function orderSubmitIgnorePdf($request, $id, $status);

}

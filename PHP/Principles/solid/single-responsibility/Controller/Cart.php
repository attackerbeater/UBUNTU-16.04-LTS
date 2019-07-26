<?php
// require_once('LoggerInterface.php');


class LoggerInterface extends Exception{

  public function error($message){
    return "Error {$message}";
  }
}

class Cart {

  private $_logger;
  private $_qty;

  public function __construct(
    LoggerInterface $logger,
    $qty
  ){
    $this->_qty = $qty;
    $this->_logger = $logger;
  }
  
  public function create(){
    try {
      if($this->_qty >= 1){
        return "You have qty {$this->_qty} in your cart. Click here to proceed <a href=''>shopping cart >></a>";
      }else{
        throw new \Exception("Cart qty {$this->_qty} is not allowed you must to select <a href=''>item(s)</a>");
      }
    } catch (\Exception $e) {
      return $this->_logger->error($e->getMessage());
    }
  }
}

$objLog = new LoggerInterface();
$qty = 1;
$objDb = new Cart($objLog, $qty);
echo $objDb->create();

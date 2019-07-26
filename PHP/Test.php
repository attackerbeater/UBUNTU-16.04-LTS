<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


interface ServiceContractInterface {
	 public function getId();
}

interface ServiceContractRepositoryInterface {
	 public function save();
}


// class DataInterface model
class ServiceContract implements ServiceContractInterface{
   public function getId(){
      return 10;
   }
}

// repository model
class ServiceContractRepository implements ServiceContractRepositoryInterface{
  	public function save(ServiceContractInterface $object){
      echo 'Data entity is saves';
    }
}



$s1 = new ServiceContractRepository();
$s1->save(new ServiceContract());




die();

//Dependency Inversion Principle - Good example
interface IWorker {
	public function work();
}

class Worker implements IWorker{
	public function work() {
		echo '....working';
	}
}

class SuperWorker  implements IWorker{
	public function work() {
		echo '.... working much more';
	}
}

class Manager {
	// IWorker worker;

  protected $worker;

	public function setWorker(IWorker $w) {
		$this->worker = $w;
	}

	public function manage() {
		$this->worker->work();
	}
}


$m1 = new Manager;
$m1->setWorker(new Worker);
$m1->manage();
echo '<br/>';
$m1 = new Manager;
$m1->setWorker(new SuperWorker);
$m1->manage();



die();

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '-1');
echo '<pre>';


$a = 'da';
$greet = function() use($a) {
  return $a;
};

echo $greet();
echo '<br/>';


$array = array('Ruby', 'PHP', 'JavaScript', 'HTML');
array_walk($array, function(&$v, $k) {
  $v = $v . ' - Programming Language';
});
print_r($array);



// $a = 1;
// // $b = &$а;
// $b = "2$a";

// echo $b;


$a= 1;
$b = &$a;
$b = 2;

echo $a. "\n";
echo $b. "\n";

$single = 'Panisales';
$married = &$single;
$married = 'Junsay';

echo $single. "\n";
echo $married. "\n";

$x = 1;
function passByReference(&$num){
  $num = 3;
  return $num;
}
echo $x. "\n";
echo passByReference($x). "\n";
echo $x. "\n";


function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}

$str = 'This is a string, ';
add_some_extra($str);
echo $str."\n";    // outputs 'This is a string, and something extra.'


function bonus(&$customer_name){

     $customer_name .= "\tYou have this 50% count";

}

$name = 'John';
bonus($name);
echo $name."\n";

die();


































class FunctionClass {

  public function __construct(){
    return call_user_func(array($this, 'method1'), array('a','b','c'));
  }

  public function method1($value){
    print_r($value);
  }
}

class Index {

  public function execute(){
    echo __METHOD__;
  }
}

class Cart {

  public function addToCart($product){
    echo __METHOD__. ' - ' . $product;
  }

  public function addToQtyCart($qty){
    echo __METHOD__. ' - ' . $qty;
  }
}

// call_user_func(array(new Index, 'execute'));
// call_user_func(array(new Cart, 'execute'));



// $url = $_SERVER['REQUEST_URI'];
// print_r(parse_url($url));
// new FunctionClass();


// class Invoke {
//   public function __invoke($arg1,$arg2){
//     return $arg1 . ' - ' .$arg2;
//   }
// }

// $invoke = new Invoke();
// echo $invoke(1,2);

class Class1 {

  // public $_public;

  protected $_cart;

  public function __construct(Cart $cart){
    $this->_cart = $cart;
     // var_dump(is_object($cart));
  }


  // public functio __destruct(){
    // unset($this->cart);
  // }

  public function __call($method, $arguments){

    // var_dump(is_object($this->_cart));
    if(method_exists($this->_cart,$method)){
      return call_user_func_array(array($this->_cart, $method), $arguments);
    }

    // echo '<br/>';
    // try {
    //   if(method_exists($this,$method)){
    //      echo 1;
    //     // return call_user_func_array(array($this, $method), $arguments);
    //   }else{
    //     throw new Exception("This method doesn't exists");
    //   }
    // } catch (Exception $e) {
    //     return $e->getMessage();
    // }
  }

  // public function __callStatic($method, $arguments){
  //   // print_r($arguments);
  // }

  // public function __clone(){
  //   $this->unknownProperty = 'copy '.$this->unknownProperty;
  // }

  // public function __set($property, $value){
  //   $this->{$property} = $value;
  // }

  // public function __get($property){
  //   if (property_exists($this, $property)) {
  //     return $this->{$property};
  //   }
  // }

  // public function __isset($property){
  //   return isset($this->{$property});
  // }

  // public function __unset($property)
  // {
  //   unset($this->{$property});
  // }

  // // other methods
  // public function unknownMethod(){
  //   return __METHOD__;
  // }

  // public function __toString(){
  //   // if(property_exists($this, $this->unknownProperty)){
  //     return "{$this->unknownProperty}";
  //   // }
  // }
}


$objClass1 = new Class1(new Cart());
// $objClass1->_public = 'Public';

$objClass1->addToCart('Bag');
echo '<br/>';
$objClass1->addToQtyCart(1);
// $objClass1->unknownMethod();

// Class1::unknownStaticMethod(1,2,3,'a','b','c', array(1,2,3,'a','b','c'));

// $objClass1->unknownProperty = 'set value for unknown Property value';
// echo $objClass1->unknownProperty;

// try {
//   if(isset($objClass1->unknownProperty)){
//     echo $objClass1;
//   }else{
//     throw new Exception("The property doesn't exist!");
//   }
// } catch (Exception $e) {
//   echo $e->getMessage();
// }



// echo '<br/>';

// $objCloneClass1 = clone $objClass1;
// $objCloneClass1->unknownProperty;

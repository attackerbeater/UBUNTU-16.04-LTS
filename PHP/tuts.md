// __invoke
// __constructor, https://www.php.net/manual/en/language.oop5.decon.php#object.construct
// __destructor

Are invoked when the method or property is inaccessible.
// __call, __callStatic,  https://www.php.net/manual/en/language.oop5.overloading.php#object.call
// __set() is run when writing data to inaccessible properties.
// __get() is utilized for reading data from inaccessible properties.
// callbacks - https://www.youtube.com/watch?v=gFJsBQIqpto

---- user for Methods
// is_callable, https://stackoverflow.com/questions/4713680/php-get-and-set-magic-methods
// closure https://www.youtube.com/watch?v=usRo_p1exBQ
// pass by reference &$a - https://www.youtube.com/watch?v=FumOXhXRDZg
// autoloading psr4 - https://www.youtube.com/watch?v=VGSerlMoIrY
   - update composer : composer self-update
   - generate vendor : composer dump-autoload -o 


Array
(
    [first] => 1
    [second] => 2
)   

1. can change key case to upper or lower

// singleton ? - use in order to restrict the number of instances 
  eg: 
    // MULTIPLE INSTANCE WITH DIFFERENT ID
    $d1 = new DB(); //ID: 1
    $d2 = new DB(); //ID: 2
    $d3 = new DB(); //ID: 3

    //SINGLE INSTANCE USING SINGLETON with ID one
    $db1 = DB::getInstance(); //ID: 1
    $db2 = DB::getInstance(); //ID: 1
    $db3 = DB::getInstance(); //ID: 1


class A {

  private function __construct(){
    echo __METHOD__;
  }

}

class B extends A {

  public function __construct(){
    echo __METHOD__;
    parent::__construct();
  }
}


class C extends B {
  public function __construct(){
    echo __METHOD__;
    parent::__construct();
  }
}


// $comp = new C;



------------------- constructor & destructor -------------------

class A {

  public $a = 10;

  public function __construct(){
    echo 1;
  }

  function __destruct(){
    print "Destroying " . __CLASS__ . "\n";
  }


}


class B extends A {

  public $a;

  public function __construct(

  ){

    $this->a = 20;
    // parent::__construct();
  }


  public function test(){
    return $this->a;
  }

  function __destruct(){
    $this->a = 21;
    print "Dont Destroying " . __CLASS__ . "\n";
  }

}

$b = new B;
echo $b->test();


------------------- __call & __callStatic -------------------


class A {

  public $a = 10;

  public function __construct(){
    // echo 1;
  }


  public static function __callStatic($name, $arguments)
  {
    // Note: value of $name is case sensitive.
    echo "Calling inaccesible object method '$name' with parameters (" . implode(', ', $arguments). ")\n";
  }


  function __destruct(){
    // print "Destroying " . __CLASS__ . "\n";
  }

}

$a = new A;
echo '<br/>';
echo A::runTest('in object context', 1,2,3,4,5);



------------------- __get & __set -------------------

class foo {

    private $car;
    public function __get($name) {

        // echo "Get:$name";
        // echo "<br/>";
        return $this->$name;
    }

    public function __set($name, $value) {

        // echo "Set:$name to $value";
        // echo "<br/>";
        $this->$name = $value;
    }
}


$foo = new foo();

echo $foo->car; // Get:bar
$foo->car = 'test';
echo "<br/>";
echo $foo->car; // Get:bar




// echo "[$foo->bar]";

<?php
//  invoke object as a function
//  https://riptutorial.com/php/example/4602/--invoke--

class Invoke {

  public function __invoke($num1, $num2){
      return $num1 + $num2;
  }

}
$objInvoke = new Invoke();
echo $objInvoke(1,2);

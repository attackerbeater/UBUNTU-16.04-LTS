<?php
// https://www.youtube.com/watch?v=zBdJMW0_1RA
$id = 3;
if($id){
  try {
    // echo "try to do somethinmg here";
    // echo "<br/>";

    if($id == 1){
      throw new \LocalizedException1();
    }elseif($id == 2){
      throw new \RuntimeException1();
    }else{
      throw new \Exception("Not less than 1", 1);
    }

  } catch (\LocalizedException1 $e) {
    echo 2;
    echo "<br/>";
    echo $e->errorMessage();
  } catch (\RuntimeException1 $e) {
    echo 3;
    echo "<br/>";
    echo $e->errorMessage();
  } catch (\Exception $e) {
    echo 4;
    echo "<br/>";
    echo $e->getMessage();
  } finally {
    echo "<br/>";
    echo "Always running.. .";
  }
}

// try {
//
//   $con = new MySQLi('localhost', 'root', 'ujohn1234', 'unknown');
//   if(mysqli_connect_error()){
//     throw new \Exception(mysqli_connect_error());
//   }
//
// } catch (\Exception $e) {
//   echo $e->getMessage();
// }


class LocalizedException1 extends Exception {
  public function errorMessage(){
    return $errorMessage = "This is an error LocalizedException 1!";
  }
}

class RuntimeException1 extends Exception {
  public function errorMessage(){
    return $errorMessage = "This is an error RuntimeException 1!";
  }
}

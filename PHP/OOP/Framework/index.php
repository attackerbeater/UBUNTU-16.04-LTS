<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'app/bootstrap.php';

use code\generated\AtmModelFactory as AtmModelFactory;
use code\Controller\Atm as Atm;
use code\View\View as View;
use lib\Database\Database as Database;

// object

//  Atm Mode lFactory
$atmModelFactory = new AtmModelFactory();

//  Atm Controller
$atm = new Atm($atmModelFactory);

// View
$view = new View($atm);
// echo $view->output();


echo '<pre>';


function CategoryTree($output=null, $parent=0, $indent=null){
  // echo 'A: '.$output;
  $db = new \PDO('mysql:host=localhost;dbname=recursive_db', 'root', 'ujohn1234');
  $r = $db->prepare("SELECT id, name FROM categories WHERE parent=:parent_id");
  $r->execute([
    'parent_id' => $parent
  ]);
  while($c= $r->fetch(PDO::FETCH_ASSOC)){
    // print_r($c);
    // echo $c['id'].$parent."\n";
    $output .='<option value='.$c['id'].'>'.$indent.$c['name'].'</option>';
    if($c['id'] !=$parent){
      CategoryTree($output, $c['id'], $indent."&nbsp;&nbsp;");
    }
  }
  // echo 'B: '.$output;
  return $output;
}

?>

<select name='category'>
<option value="0">Select a Category</option>
<?php echo CategoryTree(); ?>
</select>
<?php



function passByReference(&$result=null){

  $result .= 1;
  $result .= 2;
  $result .= 3;
  return $result;
}


echo 'output: ' .passByReference();
die();


// $arr1 = array(1,2,3);
// print_r(array_fill(0, 8, 'gift'));
// print_r(array_fill_keys($arr1, 'gift'));

// function myfunction($a,$b)
// {
//   if ($a===$b)
//   {
//     return 0;
//   }
//   return ($a>$b)?1:-1;
// }
//
// $a1=array("a"=>"red","b"=>"green","c"=>"blue");
// print_r($a1);
// $a2=array("a"=>"red","b"=>"blue","c"=>"green");
// print_r($a2);
// echo '-------- array_udiff_assoc -----------';
// $result=array_udiff_assoc($a1,$a2,"myfunction");
// print_r($result);
// echo '-------- array_diff_assoc -----------';
// $result=array_diff_assoc($a1,$a2);
// print_r($result);
//
// session_start();
//
// $email = 'junsayjohn4@gmail.com';
// if(isset($email) && $email !==''){
//   $_SESSION['_email'] = $email;
// }
//
// print_r($_SESSION);
// unset($_SESSION['_email']);
// print_r($_SESSION);

// function myfunction_key($a,$b)
// {
//   // echo "$a === $b\n";
//   if ($a===$b)
//   {
//   return 0;
//   }
//   return ($a>$b)?1:-1;
// }
//
// function myfunction_value($a,$b)
// {
//   // echo "$a === $b\n";
//   if ($a===$b)
//   {
//   return 0;
//   }
//   return ($a>$b)?1:-1;
// }
//
// $a1=array("a"=>"red","b"=>"green","c"=>"blue");
// print_r($a1);
// $a2=array("a"=>"red","b"=>"green","c"=>"green");
// print_r($a2);
// $result=array_udiff_uassoc($a1,$a2,"myfunction_key","myfunction_value");
// print_r($result);


// PHP program to illustrate
// array_udiff_uassoc() function

// comparision function for array values
// function value_Funtion($a, $b)
// {
//     // echo "$a === $b\n";
//
//     if ($a === $b) {
//         return 0;
//     }
//     return ($a > $b) ? 1 : -1;
// }

// comparision function for array keys
// function key_Funtion($a, $b)
// {
//     echo "$a === $b\n";
//     if ($a === $b) {
//         return 0;
//     }
//     return ($a > $b) ? 1 : -1;
// }
//
//
// // array1  list for comparison.
// $arr1 = array(
//     "m" => "C lab",
//     "n" => "Java lab",
//     "o" => "C# lab",
//     "x" => "C++ lab",
//     "y" => "Ruby lab",
// );
// print_r($arr1);
//
// //array2  list for comparison.
// $arr2 = array(
//     "m" => "C lab",
//     "b" => "Java lab",
//     "c" => "C# lab",
//     "x" => "C++ lab",
//     "n" => "Ruby lab",
// );
// print_r($arr2);
// $result = array_udiff_uassoc($arr1,$arr2, "value_Funtion", "key_Funtion");
//
// // print result.
// print_r($result);

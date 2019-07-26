<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo '<pre>';

$arr1 = ['blue', 'red', 'pink', 'orange', 'yellow', 'gray'];
print_r($arr1);
$arr2 = ['green','blue','red', 'black', 'blue'];
print_r($arr2);
echo "----------------------- array_diff_key ----------------------- \n";
print_r(array_diff_key($arr1, $arr2));
echo "----------------------- array_diff_ukey ----------------------- \n";
// function key_compare_func1($key1, $key2)
// {
//   if ($key1 == $key2)
// 			// return 0;
//       echo "1st $key1 == $key2 \n ";
//   else if ($key1 > $key2)
// 			// return 1;
//       echo "2nd $key1 == $key2 \n";
//   else
// 			// return -1;
//       echo "3rd $key1 == $key2\n";
// }
function key_compare_func2($key1, $key2){
	if ($key1 == $key2)
			return 0;
  return ($key1 > $key2)? 1: -1;
}
// print_r(array_diff_ukey($arr1, $arr2, 'key_compare_func1'));
print_r(array_diff_ukey($arr1, $arr2, 'key_compare_func2'));
echo "----------------------- array_diff ----------------------- \n";
print_r(array_diff($arr1, $arr2));
echo "----------------------- array_udiff ----------------------- \n";
function value_compare_func($arr1, $arr2){
  if($arr1 === $arr2){
    return 0;
  }
  return ($arr1 > $arr2)? 1: -1;
}
print_r(array_udiff($arr1, $arr2, 'value_compare_func'));
echo "----------------------- array_diff_assoc ----------------------- \n";
print_r(array_diff_assoc($arr1, $arr2));
echo "----------------------- array_udiff_assoc ----------------------- \n";
function value_compare_array_udiff_assoc($arr1, $arr2){
	if($arr1 === $arr2){
		return 0;
	}
	return ($arr1 > $arr2)? 1: -1;
}
print_r(array_udiff_assoc($arr1, $arr2, 'value_compare_array_udiff_assoc'));
echo "----------------------- array_diff_uassoc ----------------------- \n";
function compare_keys($a, $b) {
	if($a === $b){
		return 0;
	}
	return ($a > $b)? 1:-1;
}
print_r(array_diff_uassoc($arr1, $arr2, 'compare_keys'));
echo "----------------------- array_udiff_uassoc ----------------------- \n";

function compare_values_array_udiff_uassoc($a, $b) {
	if($a === $b){
		return 0;
	}
	return ($a > $b)? 1:-1;
}
function compare_keys_array_udiff_uassoc($a, $b) {
	if($a === $b){
		return 0;
	}
	return ($a > $b)? 1:-1;
}
print_r(array_udiff_uassoc($arr1, $arr2, 'compare_values_array_udiff_uassoc', 'compare_keys_array_udiff_uassoc'));

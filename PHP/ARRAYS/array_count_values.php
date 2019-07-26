<?php
echo '<pre>';

$arr1 =[
	'customer 1',
	'customer 2',
	'customer 3',
  'customer 4',
  'customer 5',
  'customer 6',
];
$arr2 =[
	'small t-shirt',
	'medium t-shirt',
	'medium t-shirt',
  'large t-shirt',
  'large t-shirt',
  'large t-shirt',
];
print_r(array_combine($arr1, $arr2));
echo "----------------------- array_count_values ----------------------- \n";
print_r(array_count_values(array_combine($arr1,$arr2)));

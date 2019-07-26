<?php
echo '<pre>';
echo "----------------------- array 1----------------------- \n";
$arr1 = [
	'FirSt',
	'SecOnd',
	'ThiRD',
	0,
    1
];
echo "----------------------- array 2----------------------- \n";
$arr2 = [
	1,
	2,
	3,
	[
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ],
    [
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ]
];
$arr = array_combine($arr1, $arr2);
print_r($arr);
echo "----------------------- array_column (works in multidimensional array) ----------------------- \n";
print_r(array_column($arr,'first_name')); // works in multidimensional array

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
print_r($arr1);
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
print_r($arr2);
echo "----------------------- array_combine ----------------------- \n";
$arr = array_combine($arr1, $arr2);
print_r($arr);

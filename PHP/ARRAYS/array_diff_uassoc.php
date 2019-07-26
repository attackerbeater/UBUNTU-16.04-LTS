<?php
// https://gist.github.com/jmc734/6749235
echo '<pre>';
echo '<hr/>';


$test1 = array(
	1	=>	"a",
	2	=>	"b",
	3	=>	"c",
   -4	=> 	"d"
);
print_r($test1);
$test2 = array(
	-1	=>	"a",
	-2	=>	"b",
	-3	=> 	"c",
	-4	=> 	"e"
);
print_r($test2);
$test3 = array(
	1	=>	array("a"),
	2	=>	array("b"),
	3	=>	array("c"),
   -4	=> 	"f"
);
print_r($test3);
function compare_keys($a, $b) {
	// echo abs($a)." - " .abs($b)."\n";
	if(abs($a) == abs($b)) return 0;
	return (abs($a) > abs($b))?1:-1;

	// echo $a." - " .$b."\n";
	// if($a === $b){
	// 	return 0;
	// }
	// return ($a > $b)? 1:-1;
}
echo "----------------------- array_diff_assoc ----------------------- \n";
print_r(array_diff_uassoc($test1, $test2, $test3, "compare_keys"));

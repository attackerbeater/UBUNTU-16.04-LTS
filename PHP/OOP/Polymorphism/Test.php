<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

interface Shape {
	public function name();
}

function test(Shape $shape) {
	$shape->name();
}

class Circle implements Shape {
	public function name() {
		echo "I am a circle";
	}
}

class Triangle implements Shape {
	public function name() {
		echo "I am a triangle";
	}
}


echo test(new Circle());
echo '<br/>';
echo test(new Triangle());



// sample 2

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

abstract class Vehicle {
	abstract public function startEngine();

	public function stopEngine() {
		echo "Engine stoped";
	}
}

class Car extends Vehicle {
	public function startEngine() {
		echo "Engine Started";
	}
}

$objCar = new Car;

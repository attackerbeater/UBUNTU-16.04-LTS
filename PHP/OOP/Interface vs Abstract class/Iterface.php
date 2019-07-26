<?php

interface Vehicle {
	public function startEngine();
}

class Car implements Vehicle {
	public function startEngine() {
		echo "Engine Started";
	}
}

$objCar = new Car;

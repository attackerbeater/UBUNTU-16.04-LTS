<?php
class TV {
	private $isOn = false;

	public function turnOn() {
		$this->isOn = true;
	}

	public function turnOff() {
		$this->isOn = false;
	}

  public function checkTv(){
    return $this->isOn;
  }
}

$tv = new TV();
$tv->turnOn();
// $tv->turnOff();

echo $tv->checkTv();

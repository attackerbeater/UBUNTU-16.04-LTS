<?php

interface MyInterface {
    public function doThis();
    public function doThat();
    public function setName($name);
    public function speak();

}

abstract class MyAbstract {
    public $name;
    public function doThis() {
        // do this
    }
    abstract public function doThat();
    abstract public function setName($name);
}

class MyClass extends MyAbstract {
    // class methods
    public function doThat(){
    }

    public function setName($name){

    }

    public function makeSpeak(MyInterface $m){
      echo $m->speak();
    }
}

$bject1 = new MyClass();

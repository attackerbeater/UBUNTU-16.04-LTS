<?php


// require_once('LoginController.php');

// new LoginController;

echo '<pre>';

  /*
    * Item class
    */
class Item{
    private $data = array();

    function __construct($options=""){ //set default to none
        $this->setNewDataClass($options); //calling function
    }

    private function setNewDataClass($options){


        // Array
        // (
        //     [nameOfTheItem] => tv
        //     [weight] => 1000
        //     [size] => 10x20x30
        // )

        foreach ($options as $key => $value) {
            // $key
              // setNameOfTheItem - true
              // setWeight - true
              // setSize - false

            $method = 'set'.ucfirst($key); //capitalize first letter of the key to preserve camel case convention naming

            if(is_callable(array($this, $method))){  //use seters setMethod() to set value for this data[key];

                $this->$method($value); //execute the setters function
            }else{
                // $this->data[$key] = $value; //create new set data[key] = value without seeters;
            }
        }
    }


    private function setNameOfTheItem($value){ // no filter
        $this->data['name'] = strtoupper($value); //assign the value
        return $this->data['name']; // return the value - optional
    }

    private function setWeight($value){ //use some kind of filter
        if($value >= "100"){
            $value = "this item is too heavy - sorry - exceeded weight of maximum 99 kg [setters filter]";
        }
        $this->data['weight'] = strtoupper($value); //asign the value
        return $this->data['weight']; // return the value - optional
    }

    function __set($key, $value){
        $method = 'set'.ucfirst($key); //capitalize first letter of the key to preserv camell case convention naming
        echo $method;
        echo "<br/>";

        if(is_callable(array($this, $method))){  //use seters setMethod() to set value for this data[key];
             // echo $key. " - " .$value;
             // echo "<br/>";

            $this->$method($value); //execute the seeter function
        }else{
             // echo $key. " - " .$value;
             // echo "<br/>";

            $this->data[$key] = $value; //create new set data[key] = value without seeters;
        }
    }

    function __get($key){
        return $this->data[$key];
    }

    function dump(){
        // var_dump($this);
        print_r($this);
    }
}

$data = array(
    'nameOfTheItem' => 'tv',
    'weight' => '1000',
    'size' => '10x20x30'
);

$item = new Item($data);
$item->dump();

$item->somethingThatDoNotExists = 0; // this key (key, value) will trigger magic function __set() without any control or check of the input,
$item->weight = 99; // this key will trigger predefined setter function of a class - setWeight($value) - value is valid,
$item->dump();

// $item->weight = 111; // this key will trigger predefined setter function of a class - setWeight($value) - value invalid - will generate warning.
// $item->dump(); // display object info



class Core {

  private $a = 10;

  public function __set($name, $value){
    return $this->name = $value;
  }

  public function __get($name){
    return $this->name;
  }

}



$c = new Core;

$c->a = 1;
echo $c->a;

<?php
// https://riptutorial.com/php/example/4606/--clone--
class CloneTest {

  public $name;
  public $lastName;

  /**
   * This method will be invoked by a clone operator and will prepend "Copy " to the
   * name and lastName properties.
   */
  public function __clone()
  {
      $this->name = "Copy " . $this->name;
      $this->lastName = "Copy " . $this->lastName;
  }
}

$user1 = new CloneTest();
$user1->name = "John";
$user1->lastName = "Doe";
echo $user1->name . ' - ' .$user1->lastName;
echo '<br/>';

// implement clone key word here
$user2 = clone $user1;
echo $user2->name . ' - ' .$user2->lastName;

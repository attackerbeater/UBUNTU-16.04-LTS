<?php

// https://riptutorial.com/php/example/4168/--tostring--

class User {
    public $first_name;
    public $last_name;
    public $age;

    public function __toString() {
        return "{$this->first_name} {$this->last_name} ($this->age)";
    }
}


$user = new User();
$user->first_name = "Chuck";
$user->last_name = "Norris";
$user->age = 76;

echo $user;

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// https://stackoverflow.com/questions/1685922/php5-const-vs-static
class ClassName {
    static $my_var = 10;  /* defaults to public unless otherwise specified */
    protected const MY_CONST = 5;

    public static function getConst(){
      return self::MY_CONST;
    }
}
echo ClassName::$my_var;   // returns 10
echo '<br/>';
// echo ClassName::MY_CONST;  // returns 5
echo ClassName::getConst();

// $c = new ClassName;
// echo $c->getConst();
ClassName::$my_var = 20;   // now equals 20
echo '<br/>';
echo ClassName::$my_var;
// ClassName::MY_CONST = 20;  // error! won't work.

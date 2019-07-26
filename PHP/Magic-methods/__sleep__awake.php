<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// https://www.youtube.com/watch?v=NI1kRzWTL5U
// https://stackoverflow.com/questions/11630341/use-of-php-magic-methods-sleep-and-wakeup
// class SleepAwake {
//
//   public $_width;
//   // public $_length;
//
//   public function __sleep(){
//     $this->_length = 1;
//     return ['_length'];
//   }
//
//   public function __wakeup(){
//     $this->_length = 20;
//   }
// }
//
// $obj = new SleepAwake();
// $obj = serialize($obj);
// echo $obj;
//
// echo '<br/>';
//
// $obj2 = unserialize($obj);
// echo $obj2->_length;

// echo '<br/>';
// echo $obj2->_width;


//
// class DBConnection{
//
//   private $host, $user, $password,$link,$db;
//
//   public function __construct($host, $user, $password,$db)
//   {
//     $this->host=$host;
//     $this->user=$user;
//     $this->password=$password;
//     $this->db=$db;
//     $this->connect();
//   }
//
//   private function connect()
//   {
//     $this->link= new mysqli($this->host,$this->user,$this->password); // mysqli_connect($this->host,$this->user,$this->password);
//     // mysql_select_db($this->db,$this->link);
//
//     if(! $this->link){
//       // die("Could not connect").mysql_error();
//       die("Connection failed: " . mysqli_connect_error());
//     }else{
//       echo"Connected<br/>";
//     }
//   }
//
//   function __sleep()
//   {
//     return array($host,$user,$password,$db);
//   }
//
//   function __wakeup()
//   {
//     $this->connect();
//   }
//
// }
//
// $var=new DBConnection("localhost","root","ujohn1234","technotrends_db");
// $var->__wakeup();


// 3 https://stackoverflow.com/questions/11630341/use-of-php-magic-methods-sleep-and-wakeup
class demoSleepWakeup {
    public $resourceM;
    public $arrayM;

    public function __construct() {
        $this->resourceM = fopen("demo.txt", "w");
        $this->arrayM = array(1, 2, 3, 4); // Enter code here
    }

    public function __sleep() {
        return array('arrayM');
    }

    public function __wakeup() {
        $this->resourceM = fopen("demo.txt", "w");
    }
}

$obj = new demoSleepWakeup();
$serializedStr = serialize($obj);
echo '<pre>';
var_dump($obj);
echo '<hr/>';
var_dump($serializedStr);
echo '<hr/>';
var_dump(unserialize($serializedStr));

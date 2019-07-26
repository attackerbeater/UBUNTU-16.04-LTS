<?php
namespace lib\Database;

class Database {

  private static $_instance;
  private $_db;

  private function __construct(){
    $this->_db = new \PDO('mysql:host=localhost;dbname=recursive_db', 'root', 'ujohn1234');
    $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  }

  private function __clone(){

  }

  public static function getInstance(){
    if(!self::$_instance){
      self::$_instance = new Database();
    }
    return self::$_instance;
  }

  public function query($sql) {
    return $this->_db->query($sql);
  }
}

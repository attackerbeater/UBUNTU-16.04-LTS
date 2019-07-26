<?php

class Db {

  private static $instance = null;

  public function __construct(){
    echo 'Database connected';
  }

  public static function getInstance(){
    if(self::$instance == null){
      self::$instance = new Db;
    }

    return self::$instance;
  }
}

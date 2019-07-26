<?php
// called when somebody is calling nonexistent static context object method in object
// https://riptutorial.com/php/example/4603/--call---and---callstatic--
class CallStatic {

  public static function __callStatic($method, $arguments){
    return 'call non existing static method';

  }
}

var_dump(CallStatic::test());

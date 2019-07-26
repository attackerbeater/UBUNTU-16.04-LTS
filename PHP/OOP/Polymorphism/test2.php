<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

interface LoggerInterface{
  public function errorMessage();
}

class Notice implements LoggerInterface {
  public function errorMessage(){
    return 'Notice Error';
  }
}

class Warning implements LoggerInterface {
  public function errorMessage(){
    return 'Warning Error';
  }
}

class Fatal implements LoggerInterface {
  public function errorMessage(){
    return 'Fatal Error';
  }
}

function logger(LoggerInterface $msg){
  return $msg->errorMessage();
}

print logger(new Notice());
print '<br/>';
print logger(new Warning());
print '<br/>';
print logger(new Fatal());

print "<hr/>";
print '<br/>';

$notice = new Notice();
print $notice->errorMessage();
print '<br/>';

$warning = new Warning();
print $warning->errorMessage();
print '<br/>';

$fatal = new Fatal();
print $fatal->errorMessage();
print '<br/>';

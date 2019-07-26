<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// https://stackoverflow.com/questions/5256623/dependency-inversion-principle-in-php
interface MyClient
{
  public function doSomething();
  public function doSomethingElse();
}

class MyHighLevelObject
{
  private $client;

  public function __construct(MyClient $client)
  {
    $this->client = $client;
  }

  public function getStuffDone()
  {

    if (false){
      echo 1;
      $this->client->doSomething();
    }else{
      echo 2;
      $this->client->doSomethingElse();
    }
  }

  // ...
}


class MyDIP implements MyClient
{
  public function doSomething()
  {
      echo __METHOD__;
  }

  public function doSomethingElse()
  {
      echo __METHOD__;
  }
}

$myDIP  = new MyDIP();
$myHighLevelObject = new MyHighLevelObject($myDIP);
echo $myHighLevelObject->getStuffDone();

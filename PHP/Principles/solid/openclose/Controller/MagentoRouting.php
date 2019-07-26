<?php

// vendor/magento/framework/app/

// \Magento\Framework\App\ApiInterface
interface ApiInterface {
  public function lunch();
}

// \Magento\Framework\App\Http
class Http implements ApiInterface {
    public function lunch(){
      // check area code
      // assign object manager
      // create FrontControllerInterace
    }
}
// \Magento\Framework\App\ApiInterface\Bootstrap
class Bootstrap{
  public function createApplication(AppInterface, $arguments = []){

  }
}

// pub/index.php
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $params);
/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication(\Magento\Framework\App\Http::class);
$bootstrap->run($app);

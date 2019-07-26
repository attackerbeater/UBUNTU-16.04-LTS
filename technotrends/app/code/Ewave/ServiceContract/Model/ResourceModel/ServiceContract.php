<?php
namespace Ewave\ServiceContract\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Ewave\ServiceContract\Model\ServiceContract as Model;

class ServiceContract extends AbstractDb {

  const TABLE = 'servicecontract_tb';

  public function _construct(){
    $this->_init(self::TABLE, Model::ID);
  }

}

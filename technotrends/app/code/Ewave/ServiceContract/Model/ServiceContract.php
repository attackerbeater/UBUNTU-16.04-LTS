<?php
namespace AcmeWidgets\ServiceContract\Model;

use \Ewave\ServiceContract\Api\DataInterface\ServiceContractInterface;
use \Magento\Framework\Model\AbstractModel;

class ServiceContract extends AbstractModel implements ServiceContractInterface {

  const COLUMN_1 = 'col 1';
	const COLUMN_2 = 'col 2';
	const COLUMN_3 = 'col 3';

  public function getColumn1(){
    return $this->getData(self::COLUMN_1);
  }

	public function setColumn1($column1){
    $this->setData(self::COLUMN_1, $column1);
  }

	public function getColumn2(){
    return $this->getData(self::COLUMN_2);
  }

	public function setColumn2($column2){
    $this->setData(self::COLUMN_2, $column2);
  }

	public function getColumn3(){
    return $this->getData(self::COLUMN_3);
  }

	public function setColumn3($column3){
    $this->setData(self::COLUMN_3, $column3);
  }

}

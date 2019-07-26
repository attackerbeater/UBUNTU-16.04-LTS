<?php
namespace AcmeWidgets\ProductPromoter\Model\ResourceModel\ProductPromoter;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {

  protected function _construct(){
    $this->_init(
      'AcmeWidgets\ProductPromoter\Model\ProductPromoter',
      'AcmeWidgets\ProductPromoter\Model\ResourceModel\ProductPromoter'
    );
  }

}

<?php
namespace AcmeWidgets\ProductPromoter\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductPromoter extends AbstractDb {

  protected function _construct(){
    $this->_init('acmewidgets_productpromoter', 'entity_id');
  }

}

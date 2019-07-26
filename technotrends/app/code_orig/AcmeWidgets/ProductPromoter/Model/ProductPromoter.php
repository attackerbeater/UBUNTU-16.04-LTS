<?php
namespace AcmeWidgets\ProductPromoter\Model;

use Magento\Framework\Model\AbstractModel;
use AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterface;

class ProductPromoter extends AbstractModel implements ProductPromoterInterface {

  protected function _construct(){
    $this->_init('AcmeWidgets\ProductPromoter\Model\ResourceModel\ProductPromoter');
  }

  /**
   * @return string|null
   */
  public function getName()
  {
      return $this->getData(self::NAME);
  }

  /**
   * @param string $name
   */
  public function setName($name)
  {
      $this->setData(self::NAME, $name);
  }


}

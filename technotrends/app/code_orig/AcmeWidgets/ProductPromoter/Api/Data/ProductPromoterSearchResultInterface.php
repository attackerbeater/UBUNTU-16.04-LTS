<?php
namespace AcmeWidgets\ProductPromoter\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ProductPromoterSearchResultInterface extends SearchResultsInterface {

  /**
    * @return \AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterface[]
    */
  public function getItems();

  /**
    * @param \AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterface[] $items
    * @return void
    */
  public function setItems(array $items);
}

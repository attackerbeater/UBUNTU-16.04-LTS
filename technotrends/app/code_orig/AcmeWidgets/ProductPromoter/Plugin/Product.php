<?php 
namespace AcmeWidgets\ProductPromoter\Plugin;

class Product {

	public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result;
    }

}
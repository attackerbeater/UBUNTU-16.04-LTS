<?php

namespace Custom\Module\Model\ResourceModel\Model;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'ad_shipping_quote_collection';
    protected $_eventObject = 'quote_collection';

    protected function _construct()
    {
        $this->_init('Custom\Module\Model\Model', 'Custom\Module\Model\ResourceModel\Model');
    }
}

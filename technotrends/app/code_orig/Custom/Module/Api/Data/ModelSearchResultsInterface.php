<?php

namespace Custom\Module\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ModelSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Custom\Module\Api\Data\ModelInterface[]
     */
    public function getItems();

    /**
     * @param \Custom\Module\Api\Data\ModelInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

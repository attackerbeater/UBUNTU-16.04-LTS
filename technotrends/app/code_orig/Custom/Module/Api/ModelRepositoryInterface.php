<?php
namespace Custom\Module\Api;

use \Custom\Module\Api\Data\ModelInterface;
use \Magento\Framework\Api\SearchCriteriaInterface;

interface ModelRepositoryInterface
{
    /**
     * @api
     * @param \Custom\Module\Api\Data\ModelInterface $model
     * @return \Custom\Module\Api\Data\ModelInterface
     */
    public function save(ModelInterface $model);

    /**
     * @api
     * @param \Custom\Module\Api\Data\ModelInterface $model
     * @return \Custom\Module\Api\Data\ModelInterface
     */
    public function delete(ModelInterface $model);

    /**
     * @api
     * @param \Custom\Module\Api\Data\ModelInterface $id
     * @return void
     */
    public function deleteById($id);

    /**
     * @api
     * @param int $id
     * @return \Custom\Module\Api\Data\ModelInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Custom\Module\Api\Data\ModelSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}

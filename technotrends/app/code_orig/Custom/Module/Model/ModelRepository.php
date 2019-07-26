<?php
namespace Custom\Module\Model;

use \Custom\Module\Api\Data\ModelInterface;
use \Custom\Module\Model\ResourceModel\Model as ObjectResourceModel;
use \Magento\Framework\Api\SearchCriteriaInterface;
use \Magento\Framework\Exception\CouldNotSaveException;
use \Magento\Framework\Exception\NoSuchEntityException;
use \Magento\Framework\Exception\CouldNotDeleteException;

class ModelRepository implements \Custom\Module\Api\ModelRepositoryInterface
{
    protected $objectFactory;

    protected $objectResourceModel;

    protected $collectionFactory;

    protected $searchResultsFactory;

    public function __construct(
        \Custom\Module\Model\ModelFactory $objectFactory,
        ObjectResourceModel $objectResourceModel,
        \Custom\Module\Model\ResourceModel\Model\CollectionFactory $collectionFactory,
        \Magento\Framework\Api\SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->objectFactory        = $objectFactory;
        $this->objectResourceModel  = $objectResourceModel;
        $this->collectionFactory    = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    public function save(ModelInterface $object)
    {
        $name = $object->getCustomerName();
        $hasSpouse = $object->getSpouse();
        if ($hasSpouse == true) {
            $name = "Mrs. " . $name;
        } else {
            $name = "Miss. " . $name;
        }
        $object->setCustomerName($name);
        try {
            $this->objectResourceModel->save($object);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $object;
    }

    /**
     * @inheritdoc
     */
    public function getById($id)
    {
        $object = $this->objectFactory->create();
        $this->objectResourceModel->load($object, $id);
        if (!$object->getId()) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
        }
        return $object;
    }

    public function delete(ModelInterface $object)
    {
        try {
            $this->objectResourceModel->delete($object);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $collection = $this->collectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $fields[] = $filter->getField();
                $conditions[] = [$condition => $filter->getValue()];
            }
            if ($fields) {
                $collection->addFieldToFilter($fields, $conditions);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $objects = [];
        foreach ($collection as $objectModel) {
            $objects[] = $objectModel;
        }
        $searchResults->setItems($objects);
        return $searchResults;
    }
}

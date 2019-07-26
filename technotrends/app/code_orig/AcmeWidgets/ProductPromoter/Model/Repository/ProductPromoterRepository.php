<?php
namespace AcmeWidgets\ProductPromoter\Model\Repository;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterface;
use AcmeWidgets\ProductPromoter\Api\ProductPromoterRepositoryInterface;
use AcmeWidgets\ProductPromoter\Model\ProductPromoterFactory;
use AcmeWidgets\ProductPromoter\Model\ResourceModel\ProductPromoter;

// for getList
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use AcmeWidgets\ProductPromoter\Model\ResourceModel\ProductPromoter\CollectionFactory;

class ProductPromoterRepository implements ProductPromoterRepositoryInterface {

  /**
   * @var ProductPromoter
   */
  protected $_productPromoterResource;

  /**
   * @var ProductPromoterFactory
   */
  protected $_productPromoterFactory;

  protected $collectionFactory;
  protected $_searchResultsInterfaceFactory;

  public function __construct(
    ProductPromoterFactory $productPromoterFactory,
    ProductPromoter $productPromoterResource,
    CollectionFactory $collectionFactory,
    SearchResultsInterfaceFactory $searchResultsInterfaceFactory
  ){
    $this->_productPromoterFactory = $productPromoterFactory;
    $this->_productPromoterResource = $productPromoterResource;
    $this->collectionFactory    = $collectionFactory;
    $this->_searchResultsInterfaceFactory = $searchResultsInterfaceFactory;
  }

  public function save(ProductPromoterInterface $object){
    /** @var ProductPromoterInterface|\Magento\Framework\Model\AbstractModel $object */
    try {
        $this->_productPromoterResource->save($object);
    } catch (Exception $exception) {
        throw new CouldNotSaveException(__(
            'Could not save the record: %1',
            $exception->getMessage()
        ));
    }
    return $object;
  }

  public function getById($id){
    $object = $this->_productPromoterFactory->create();
    $this->_productPromoterResource->load($object, $id);
    if (!$object->getId()) {
        throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
    }
    return $object;
  }

  public function delete(ProductPromoterInterface $object){
    try {
      $this->_productPromoterResource->delete($object);
    } catch (\Exception $exception) {
      throw new CouldNotDeleteException(__($exception->getMessage()));
    }
    return true;
  }

  public function deleteById($id){
    return $this->delete($this->getById($id));
  }

  public function getPromoter($id){
    return "Get the promoter ID:\n" .$id;
  }

  public function getList(SearchCriteriaInterface $criteria){
    $searchResults = $this->_searchResultsInterfaceFactory->create();
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

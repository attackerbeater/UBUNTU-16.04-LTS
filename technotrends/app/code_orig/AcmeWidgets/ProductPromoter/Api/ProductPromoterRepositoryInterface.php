<?php
namespace AcmeWidgets\ProductPromoter\Api;

use AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductPromoterRepositoryInterface {

  /**
   * @param int $id
   * @return array
   */
  public function getPromoter($id);

  /**
   * Save record.
   *
   * @param ProductPromoterInterface $object
   * @return ProductPromoterInterface
   * @throws \Magento\Framework\Exception\LocalizedException
   */
  public function save(ProductPromoterInterface $object);

  /**
   * Retrieve record.
   *
   * @param int $id
   * @return ProductPromoterInterface
   * @throws \Magento\Framework\Exception\LocalizedException
   */
  public function getById($id);

  /**
   * Delete record.
   *
   * @param ProductPromoterInterface $object
   * @return bool true on success
   * @throws \Magento\Framework\Exception\LocalizedException
   */
  public function delete(ProductPromoterInterface $object);

  /**
   * Delete record by ID.
   *
   * @param int $id
   * @return bool true on success
   * @throws \Magento\Framework\Exception\NoSuchEntityException
   * @throws \Magento\Framework\Exception\LocalizedException
   */
  public function deleteById($id);

  /**
   * Get product promoter list
   *
   * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
   * @return \Magento\Catalog\Api\Data\ProductSearchResultsInterface
   */
  public function getList(SearchCriteriaInterface $criteria);

}

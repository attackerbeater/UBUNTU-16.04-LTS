<?php
namespace Ewave\ServiceContract\Api\ServiceInterface;

use Magento\Framework\Api\SearchCriteriaInterface;
use Ewave\ServiceContract\Api\DataInterface\ServiceContractInterface;

interface ServiceContractRepositoryInterface {

	  /**
     * Save record.
     *
     * @param ServiceContractRepositoryInterface $object
     * @return ServiceContractRepositoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(ServiceContractRepositoryInterface $object);

    /**
     * Retrieve record.
     *
     * @param int $id
     * @return ServiceContractRepositoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Delete record.
     *
     * @param ServiceContractRepositoryInterface $object
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(ServiceContractRepositoryInterface $object);

    /**
     * Delete record by ID.
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);


    public function getList(SearchCriteriaInterface $searchCriteria);
}

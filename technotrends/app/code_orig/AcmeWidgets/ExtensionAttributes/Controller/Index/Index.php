<?php

namespace AcmeWidgets\ExtensionAttributes\Controller\Index;

use Magento\Framework\Api\SearchCriteriaBuilder;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/** This class is not required for use Extension Attributes and created only for sample */
class Index extends Action
{

  private $searchCriteria;

  /**
   * @var CustomerRepositoryInterface
   */
  private $customerRepository;

  /**
   * @param Context $context
   * @param CustomerRepositoryInterface $customerRepository
   */
  public function __construct(
      Context $context,
      SearchCriteriaBuilder $searchCriteria,
      CustomerRepositoryInterface $customerRepository
  ) {
      parent::__construct($context);
      $this->searchCriteria = $searchCriteria;
      $this->customerRepository = $customerRepository;
  }

  /**
   * URL: .../index.php/ExtensionAttribute/hello/index
   */
  public function execute()
  {
      try {
          echo '<pre>';
          // $search = $this->searchCriteria->create();
          // $customer = $this->customerRepository->getList($search)->getItems();
          //
          // print_r($customer->getData());


          $customer = $this->customerRepository->getById(1);

          var_dump($customer->getExtensionAttributes());
          print_r($customer->getExtensionAttributes());
      } catch (\Throwable $throwable) {
          echo $throwable->getMessage();
      }

      die;
  }
}

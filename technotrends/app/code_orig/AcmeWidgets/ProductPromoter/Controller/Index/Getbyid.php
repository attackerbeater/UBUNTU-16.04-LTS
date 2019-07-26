<?php

namespace AcmeWidgets\ProductPromoter\Controller\Index;

use \Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class Getbyid extends \Magento\Framework\App\Action\Action
{

  /**
   * Index resultPageFactory
   * @var PageFactory
   */
  private $resultPageFactory;

  /**
   * @var
   */
  private $modelFactory;

  /**
   * @var
   */
  private $_productPromoterRepository;

  /**
   * @var
   */
  protected $resultJsonFactory;

  /**
   * Index constructor.
   * @param \Magento\Framework\App\Action\Context $context
   * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
   */
  public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    JsonFactory $resultJsonFactory,
    \AcmeWidgets\ProductPromoter\Api\ProductPromoterRepositoryInterface $productPromoterRepository
  ) {
    $this->resultPageFactory = $resultPageFactory;
    $this->resultJsonFactory = $resultJsonFactory;
    $this->_productPromoterRepository = $productPromoterRepository;
    return parent::__construct($context);
  }

  public function execute()
  {
    $result = $this->resultJsonFactory->create();
    $search= $this->_productPromoterRepository->getById(14);

    $result->setData([$search->getData()]);
    return $result;

  }

}

<?php
namespace AcmeWidgets\ProductPromoter\Controller\Index;

use \Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class Deletebyid extends \Magento\Framework\App\Action\Action
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
  private $_productPromoterFactory;

  /**
   * @var
   */
  private $_productPromoterRepository;

  /**
   * Index constructor.
   * @param \Magento\Framework\App\Action\Context $context
   * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
   */
  public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    \AcmeWidgets\ProductPromoter\Api\ProductPromoterRepositoryInterface $productPromoterRepository
  ) {
    $this->resultPageFactory = $resultPageFactory;
    $this->_productPromoterRepository = $productPromoterRepository;
    return parent::__construct($context);
  }

  public function execute()
  {
    $this->_productPromoterRepository->deleteById(12);
  }

}

<?php
namespace AcmeWidgets\ProductPromoter\Controller\Index;

class Del extends \Magento\Framework\App\Action\Action
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
    \AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterfaceFactory $productPromoterFactory,
    \AcmeWidgets\ProductPromoter\Api\ProductPromoterRepositoryInterface $productPromoterRepository
  ) {
    $this->resultPageFactory = $resultPageFactory;
    $this->_productPromoterFactory = $productPromoterFactory;
    $this->_productPromoterRepository = $productPromoterRepository;
    return parent::__construct($context);
  }

  public function execute()
  {
    $obj = $this->_productPromoterFactory->create()->load(13);
    $this->_productPromoterRepository->delete($obj);
  }


}

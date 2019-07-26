<?php
namespace AcmeWidgets\Knockout\Controller\Sidebar;
use AcmeWidgets\Knockout\Model\Sidebar;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Response\Http;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Json\Helper\Data;
use Psr\Log\LoggerInterface;
class UpdateItemQty extends \Magento\Checkout\Controller\Sidebar\UpdateItemQty
{
    /**
     * @var Sidebar
     */
    protected $sidebar;
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var Data
     */
    protected $jsonHelper;
    /**
     * @param Context $context
     * @param Sidebar $sidebar
     * @param LoggerInterface $logger
     * @param Data $jsonHelper
     * @codeCoverageIgnore
     */
    public function __construct(
        Context $context,
        Sidebar $sidebar,
        Data $jsonHelper,
        LoggerInterface $logger
    ) {
        parent::__construct($context, $sidebar, $logger, $jsonHelper);
    }
    /**
     * @return $this
     */
    public function execute()
    {
        $itemId = (int)$this->getRequest()->getParam('item_id');
        $itemQty = $this->getRequest()->getParam('item_qty') * 1;
        $itembtnplus = $this->getRequest()->getParam('item_btn_plus');
        $itembtnminus = $this->getRequest()->getParam('item_btn_minus');
        $itemQty = $itemQty . ',' . $itembtnplus . $itembtnminus;
        try {
            $this->sidebar->checkQuoteItem($itemId);
            $this->sidebar->updateQuoteItem($itemId, $itemQty);
            return $this->jsonResponse();
        } catch (LocalizedException $e) {
            return $this->jsonResponse($e->getMessage());
        } catch (\Exception $e) {
            $this->logger->critical($e);
            return $this->jsonResponse($e->getMessage());
        }
    }
    /**
     * Compile JSON response
     *
     * @param string $error
     * @return Http
     */
    protected function jsonResponse($error = '')
    {
        return $this->getResponse()->representJson(
            $this->jsonHelper->jsonEncode($this->sidebar->getResponseData($error))
        );
    }
}

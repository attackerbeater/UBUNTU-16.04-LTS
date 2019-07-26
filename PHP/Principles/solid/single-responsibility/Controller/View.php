<?php
namespace Magento\Cms\Controller\Page;

class View extends \Magento\Framework\App\Action\Action {

    public function execute() {

        $pageId = $this->getRequest()->getParam('page_id', $this->getRequest()->getParam('id', false));
        $resultPage = $this->_objectManager->get(\Magento\Cms\Helper\Page::class)->prepareResultPage($this, $pageId);
        if (!$resultPage) {
            $resultForward = $this->resultForwardFactory->create();
            return $resultForward->forward('noroute');
        }
    return $resultPage;
    }
}

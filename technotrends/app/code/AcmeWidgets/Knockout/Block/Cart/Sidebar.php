<?php
namespace AcmeWidgets\Knockout\Block\Cart;

class Sidebar extends \Magento\Checkout\Block\Cart\Sidebar
{
    /**
     * Get update cart item url
     *
     * @return string
     * @codeCoverageIgnore
     * @SuppressWarnings(PHPMD.RequestAwareBlockMethod)
     */
    public function getUpdateItemQtyUrl()
    {
        return $this->getUrl('acmewidgets_knockout/sidebar/updateItemQty', ['_secure' => $this->getRequest()->isSecure()]);
    }
}

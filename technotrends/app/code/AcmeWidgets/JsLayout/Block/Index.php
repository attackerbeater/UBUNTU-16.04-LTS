<?php

namespace AcmeWidgets\JsLayout\Block;

class Index extends \Magento\Framework\View\Element\Template{

    /**
     * @var array
     */
    protected $jsLayout;

    public function __construct(
      \Magento\Framework\View\Element\Template\Context $context,
      array $data = []
    ){
      parent::__construct($context, $data);
      $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
    }

    /**
     * @return string
     */
    public function getJsLayout()
    {
      return \Zend_Json::encode($this->jsLayout);
    }

}

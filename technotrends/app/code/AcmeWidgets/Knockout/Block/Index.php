<?php

namespace AcmeWidgets\Knockout\Block;

class Index extends \Magento\Framework\View\Element\Template{

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


    public function getDiv1Content(){
      return 'Boom Panot ka!';
    }

    public function getDiv2Content(){
      return 'Boom Panot ka 2!';
    }

}

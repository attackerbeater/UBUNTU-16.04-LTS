<?php

class ParentClass {
  public function word(){
    return "Parent word";
  }
}

class Child1 extends ParentClass {
  public function word(){
    return "Child 1 word";
  }
}


$child1 = new Child1();
echo $child1->word();

// 2
// https://www.w3solver.com/magento2-solid-principle/#
// namespace Magento\Ups\Model\Config\Source;
//
// use Magento\Shipping\Model\Carrier\Source\GenericInterface;
//
// class Generic implements GenericInterface {
//
//     public function toOptionArray()
//     {
//         $configData = $this->carrierConfig->getCode($this->_code);
//         $arr = [];
//         foreach ($configData as $code => $title) {
//             $arr[] = ['value' => $code, 'label' => __($title)];
//         }
//         return $arr;
//     }
// }
//
// namespace Magento\Ups\Model\Config\Source;
//
// class OriginShipment extends \Magento\Ups\Model\Config\Source\Generic
//
// {
//     protected $_code = 'originShipment';
//     public function toOptionArray()
//     {
//         $orShipArr = $this->carrierConfig->getCode($this->_code);
//         $returnArr = [];
//         foreach ($orShipArr as $key => $val) {
//             $returnArr[] = ['value' => $key, 'label' => $key];
//         }
//         return $returnArr;
//     }
//     return $returnArr;
//     }
// }

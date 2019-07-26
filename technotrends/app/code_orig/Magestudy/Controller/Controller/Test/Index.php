<?php

namespace Magestudy\Controller\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @return PageFactory
     */
    public function execute()
    {
        // echo __METHOD__;
        //index.php/controller/test/index or index.php/controller/test/
        // echo 'Test controller; Index action;';
        // echo $customerSession = $this->_objectManager->create("Magento\Customer\Model\Session");
        // die;

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        // $object = $objectManager->create('Magento\Core\Model\Session\Storage');
        // $object = $objectManager->create('Magestudy\Controller\Model\MyVirtualType');
        // $class_name = $object;
        // echo '<pre>';
        // var_dump($class_name);
        // Magento\Core\Model\Config
        $object2 = $objectManager->create('Magestudy\Controller\Model\Template');
        $class_name2 = $object2;
        echo '<pre>';
        var_dump($class_name2);


        //
        // $object1 = $objectManager->create('Magento\Framework\Session\Storage');
        // $class_name1 = $object1;
        // echo '<pre>';
        // var_dump($class_name1);
        // $methods = get_class_methods($class_name);
        // foreach($methods as $method)
        // {
        //     var_dump($method);
        //     echo "<br>";
        // }
        // $collection = $productCollection->create()
        //             ->addAttributeToSelect('*')
        //             ->load();
        // foreach ($collection as $product){
        //      echo 'Name  =  '.$product->getName().'<br>';
        // }
    }
}

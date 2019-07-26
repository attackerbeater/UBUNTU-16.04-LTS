<?php

namespace AcmeWidgets\ExtensionAttributes\Plugin;

use AcmeWidgets\ProductPromoter\Api\ProductPromoterRepositoryInterface;
use AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterface;
use Magento\Framework\App\ObjectManager;
use AcmeWidgets\ExtensionAttributes\Api\Data\ExtensionAttributesInterface;

class ExtensionAttributesRepository
{
    private $exampleInterface;

    public function __construct(
      ExtensionAttributesInterface $exampleInterface
    ){
      $this->exampleInterface = $exampleInterface;
    }

    /**
     * @param ProductPromoterRepositoryInterface $subject
     * @param ProductPromoterInterface $customer
     * @return ProductPromoterInterface
     */
    public function afterGet(ProductPromoterRepositoryInterface $subject, ProductPromoterInterface $customer)
    {
        $this->loadExtensionAttributes($customer);

        return $customer;
    }

    /**
     * @param ProductPromoterRepositoryInterface $subject
     * @param ProductPromoterInterface $customer
     * @return ProductPromoterInterface
     */
    public function afterGetById(ProductPromoterRepositoryInterface $subject, ProductPromoterInterface $customer)
    {
        $this->loadExtensionAttributes($customer);

        return $customer;
    }

    /**
     * @param ProductPromoterInterface $customer
     */
    protected function loadExtensionAttributes(CustomerInterface &$customer)
    {
        /** @var ExtensionAttributesInterface $exampleObject */
        // $exampleObject = $this->getExampleObject();
        // $exampleObject->setValue('999');

        $extensionAttributes = $customer->getExtensionAttributes();
        if (is_object($extensionAttributes)) {
            $extensionAttributes->setData('extension_attribute_one', 'someText');
            $extensionAttributes->setData('extension_attribute_two', 'exampleObject');
            $customer->setExtensionAttributes($extensionAttributes);
        }
    }

    /**
     * @return ExtensionAttributesInterface
     */
    protected function getExampleObject()
    {
        return ObjectManager::getInstance()->create(ExtensionAttributesInterface::class); //bad practice. used only for sample
      // return $this->exampleInterface->create();

    }
}

<?php
namespace AcmeWidgets\ProductPromoter\Api\Data;

use Magento\Framework\Api\CustomAttributesDataInterface;
// use Magento\Framework\Api\ExtensibleDataInterface;

interface ProductPromoterInterface {

  const NAME = 'name';

  /**
    * ProductPromoter id
    *
    * @return int|null
    */
  public function getId();

  /**
  * Set ProductPromoter id
  *
  * @param int $id
  * @return $this
  */
  public function setId($id);

  /**
   * ProductPromoter name
   *
   * @return string|null
   */
  public function getName();

  /**
   * Set ProductPromoter name
   *
   * @param string $name
   * @return $this
   */
  public function setName($name);

  // /**
  // * Retrieve existing extension attributes object or create a new one.
  // *
  // * @return \AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterExtensionInterface|null
  // */
  // public function getExtensionAttributes();
  //
  // /**
  // * Set an extension attributes object.
  // *
  // * @param \AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterExtensionInterface $extensionAttributes
  // * @return $this
  // */
  // public function setExtensionAttributes(
  //   \AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterExtensionInterface $extensionAttributes
  // );
}

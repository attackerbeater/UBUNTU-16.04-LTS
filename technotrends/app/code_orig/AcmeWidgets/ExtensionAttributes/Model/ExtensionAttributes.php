<?php
namespace AcmeWidgets\ExtensionAttributes\Model;

use AcmeWidgets\ExtensionAttributes\Api\Data\ExtensionAttributesInterface;

class ExtensionAttributes implements ExtensionAttributesInterface
{

    protected $value;

    /**
     * Return value.
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value.
     *
     * @param string|null $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}

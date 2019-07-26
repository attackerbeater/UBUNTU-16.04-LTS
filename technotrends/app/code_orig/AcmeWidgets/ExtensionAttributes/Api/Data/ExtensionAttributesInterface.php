<?php
namespace AcmeWidgets\ExtensionAttributes\Api\Data;

interface ExtensionAttributesInterface
{
    /**
     * Return value.
     *
     * @return string|null
     */
    public function getValue();

    /**
     * Set value.
     *
     * @param string|null $value
     * @return $this
     */
    public function setValue($value);
}

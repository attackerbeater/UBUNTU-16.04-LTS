<?php
/**
 * @package Divante\rapid
 * @author Bartosz Picho <bpicho@divante.pl>
 * @copyright 2017 Divante Sp. z o.o.
 * @license See LICENSE_DIVANTE.txt for license details.
 */

$type = \Magento\Framework\Component\ComponentRegistrar::THEME;
$componentName =  'frontend/Divante/rapid'; 
$path = __DIR__;

\Magento\Framework\Component\ComponentRegistrar::register($type, $componentName, $path);
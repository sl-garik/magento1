<?php
$installer = $this;

$installer->startSetup();

$installer->addAttribute('catalog_product', 'cust_price_ship', array(
    'group' => 'Prices',
    'type' => 'text',
    'input' => 'text',
    'label' => 'Custom price shipping',
    'global' => 1,
    'visible' => 1,
    'required' => 0,
    'user_defined' => 0,
    'default' => '',
    'visible_on_front' => 1
));

$installer->endSetup();

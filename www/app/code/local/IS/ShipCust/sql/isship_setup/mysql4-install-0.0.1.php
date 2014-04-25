<?php
$installer = $this;

$installer->startSetup();

//$installer->removeAttribute('catalog_product', 'cust_price_ship');
$installer->addAttribute('catalog_product', 'cust_price_ship', array(
    'group' => 'Prices',
    'type' => 'decimal',
    'input' => 'price',
    'label' => 'Custom price shipping',
    'global' => 1,
    'visible' => 1,
    'required' => 0,
    'user_defined' => 0,
    'default' => '',
    'visible_on_front' => 1
));

$installer->getConnection()->addColumn(
    $this->getTable('sales/quote_item'), //table name
    'cust_price_ship',      //column name
    'decimal'  //datatype definition
);

$installer->endSetup();

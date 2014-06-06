<?php
$installer = $this;

$installer->startSetup();

$installer->run("
ALTER TABLE `".$this->getTable('sales_flat_quote_address')."` ADD  `fee_is` DECIMAL( 10, 2 ) NOT NULL;
ALTER TABLE `".$this->getTable('sales_flat_quote_address')."` ADD  `base_fee_is` DECIMAL( 10, 2 ) NOT NULL;
");

$installer->endSetup();

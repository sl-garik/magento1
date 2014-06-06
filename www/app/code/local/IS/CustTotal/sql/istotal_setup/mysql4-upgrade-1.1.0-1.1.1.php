<?php
$installer = $this;

$installer->startSetup();

$installer->run("
ALTER TABLE `".$this->getTable('sales_flat_quote')."` ADD  `fee_is` DECIMAL( 10, 2 ) NOT NULL;
ALTER TABLE `".$this->getTable('sales_flat_quote')."` ADD  `base_fee_is` DECIMAL( 10, 2 ) NOT NULL;
ALTER TABLE `".$this->getTable('sales_flat_order')."` ADD  `fee_is` DECIMAL( 10, 2 ) NOT NULL;
ALTER TABLE `".$this->getTable('sales_flat_order')."` ADD  `base_fee_is` DECIMAL( 10, 2 ) NOT NULL;
ALTER TABLE `".$this->getTable('sales_flat_order')."` ADD  `fee_invoiced_is` DECIMAL( 10, 2 ) NOT NULL;
ALTER TABLE `".$this->getTable('sales_flat_order')."` ADD  `base_fee_invoiced_is` DECIMAL( 10, 2 ) NOT NULL;
ALTER TABLE `".$this->getTable('sales_flat_order')."` ADD  `fee_refunded_is` DECIMAL( 10, 2 ) NOT NULL;
ALTER TABLE `".$this->getTable('sales_flat_order')."` ADD  `base_fee_refunded_is` DECIMAL( 10, 2 ) NOT NULL;
");

$installer->endSetup();

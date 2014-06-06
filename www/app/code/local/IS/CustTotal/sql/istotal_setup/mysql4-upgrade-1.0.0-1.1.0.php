<?php
//die('mysql-upgrade');
$installer = $this;

$installer->startSetup();

$installer->run("
ALTER TABLE `".$this->getTable('sales/order')."` DROP `fee_amount`, DROP `base_fee_amount`, DROP `fee_amount_invoiced`, DROP `base_fee_amount_invoiced`, DROP `fee_amount_refunded`,DROP `base_fee_amount_refunded`;
ALTER TABLE `".$this->getTable('sales/creditmemo')."` DROP `fee_amount`, DROP `base_fee_amount`;
ALTER TABLE `".$this->getTable('sales/quote_address')."` DROP `fee_amount`, DROP `base_fee_amount`;
ALTER TABLE `".$this->getTable('sales/invoice')."` DROP `fee_amount`, DROP `base_fee_amount`;
");

$installer->endSetup();

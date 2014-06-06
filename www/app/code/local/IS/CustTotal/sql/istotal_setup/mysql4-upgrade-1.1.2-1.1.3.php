<?php
$installer = $this;

$installer->startSetup();

$installer->run("
ALTER TABLE `".$this->getTable('sales_flat_quote')."` DROP `fee_is`, DROP `base_fee_is`;
");

$installer->endSetup();

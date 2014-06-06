<?php
$installer = $this;
$installer->startSetup();

$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('zip_price')};
CREATE TABLE `{$this->getTable('zip_price')}` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `ZipCode` varchar(255) NOT NULL,
 `NewPrice` decimal(12,4) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
");

$installer->endSetup();

<?php
/*** Получение ресурсной модели */
$resource = Mage::getSingleton('core/resource');

/*** Установка соединения для записи */
$writeConnection = $resource->getConnection('core_write');

/*** Получение имени таблицы */
$table = $resource->getTableName('catalog/product');

/*** Установка product ID */
$newTit = 'new-tit';
$newCont = 'new-cont';
$newTime = time();

$query = 'INSERT INTO {$table}(title, content, created) VALUES("'.$newTit.'", "'.$newCont.'", "'.$newTime.'")';

/*** Выполнение запроса */
$writeConnection->query($query);
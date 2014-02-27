<?php

class DS_News_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        //echo '<h1>News</h1>';
        $resource = Mage::getSingleton('core/resource');
        $read = $resource->getConnection('core_read');
        $table = $resource->getTableName('dsnews/table_news');

        $select = $read->select()
            ->from($table, array('news_id', 'title', 'content', 'created'))
            ->order('created DESC');

        $news = $read->fetchAll($select);
        Mage::register('news', $news);

        $this->loadLayout();
        $this->renderLayout();
    }
    public  function addToBase()
    {
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
    }

}
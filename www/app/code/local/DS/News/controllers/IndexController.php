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
    public  function add2baseAction()
    {
        /*** Получение ресурсной модели *//*** Установка соединения для записи */
        $connection = Mage::getSingleton('core/resource')->getConnection('core_write');
        /*** Получение имени таблицы */
        $table = $connection->getTableName('ds_news_entities');
        $connection->beginTransaction();
        $fields = array();
        $fields['title']= 'new_titl5';
        $fields['content']='new_cont5';
        $fields['created']= date('Y-m-d H:i:s');

        $connection->insert($table, $fields);
        $connection->commit();
        $this->loadLayout();
        $this->renderLayout();

    }

}
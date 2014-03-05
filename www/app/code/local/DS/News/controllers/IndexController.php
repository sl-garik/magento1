<?php

class DS_News_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
//        //echo '<h1>News</h1>';
//        $resource = Mage::getSingleton('core/resource');
//        $read = $resource->getConnection('core_read');
//        $table = $resource->getTableName('dsnews/table_news');
//
//        $select = $read->select()
//            ->from($table, array('news_id', 'title', 'content', 'created'))
//            ->order('created DESC');
//
//        $news = $read->fetchAll($select);
//        Mage::register('news', $news);
//
//        $this->loadLayout();
//        $this->renderLayout();

        $news = Mage::getModel('dsnews/news')->getCollection()->setOrder('created', 'DESC');
        $viewUrl = Mage::getUrl('news/index/view');

        echo '<h1>News</h1>';
        foreach ($news as $item) {
//            echo '<h2><a href="' . $viewUrl . '?id=' . $item->getId() . '">' . $item->getTitle() . '</a></h2>';
            echo '<h2><a href="' . Mage::getUrl('news/index/view', array('id' => $item->getId())) . '">' . $item->getTitle() . '</a></h2>';
        }
    }

    public function viewAction()
    {
        $newsId = Mage::app()->getRequest()->getParam('id', 0);
        $news = Mage::getModel('dsnews/news')->load($newsId);

        if ($news->getId() > 0) {
            echo '<h1>' . $news->getTitle() . '</h1>';
            echo '<div class="content">' . $news->getContent() . '</div>';
            echo '<div class="content">' . $news->getCreated() . '</div>';
        } else {
            $this->_forward('noRoute');
        }
    }

//    public  function add2baseAction()
//    {
//        /*** Получение ресурсной модели *//*** Установка соединения для записи */
//        $connection = Mage::getSingleton('core/resource')->getConnection('core_write');
//        /*** Получение имени таблицы */
//        $table = $connection->getTableName('ds_news_entities');
//        $connection->beginTransaction();
//        $fields = array();
//        $fields['title']= 'new_titl5';
//        $fields['content']='new_cont5';
//        $fields['created']= date('Y-m-d H:i:s');
//
//        $connection->insert($table, $fields);
//        $connection->commit();
//        $this->loadLayout();
//        $this->renderLayout();
//
//    }

}
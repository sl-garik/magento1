<?php

class DS_News_Model_News extends Mage_Core_Model_Abstract
{
    function _construct()
    {
        parent::_construct();
        $this->_init('dsnews/news');
    }
}
<?php
class DS_News_Block_Adminhtml_News extends  Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        $this->_addButtonLabel = Mage::helper('dsnews')->__('Add New news');

        $this->_blockGroup = 'dsnews';
        $this->_controller = 'adminhtml_news';
        $this->_headerText = Mage::helper('dsnews')->__('news');
    }
}
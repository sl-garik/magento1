<?php
class DS_News_Block_Adminhtml_Edit extends  Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'dsnews';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml';

        $news_id = (int)$this->getRequest()->getParam('news_id');
        if(!news_id) {
            //    Mage::throwException($this->__('Quote with this id does not exists'));
        }
        $news = Mage::getModel('dsnews/news')->load($news_id);
        Mage::register('current_news', $news);
        $this->_removeButton('reset');
    }

    public function getHeaderText()
    {
        $news = Mage::registry('current_news');
        if ($news->getId()) {
            return Mage::helper('dsnews')->__("Edit news '%s'", $this->escapeHtml($news->getName()));
        } else {
            return Mage::helper('dsnews')->__("Add new news");
        }
    }
}
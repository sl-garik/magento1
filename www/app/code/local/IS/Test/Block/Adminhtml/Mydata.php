<?php
class IS_Test_Block_Adminhtml_Mydata extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        //$this->_addButtonLabel = Mage::helper('istest')->__('Add New Mydata');

        $this->_blockGroup = 'istest';
        $this->_controller = 'adminhtml_mydata';
        $this->_headerText = Mage::helper('istest')->__('Mydata');
        parent::__construct();
        $this->removeButton('add');

    }

//    protected function _prepareLayout()
//    {
//        $this->unsetChild('reset_filter_button');
//        $this->unsetChild('search_button');
//    }
}
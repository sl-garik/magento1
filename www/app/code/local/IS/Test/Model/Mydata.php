<?php
class IS_Test_Model_Mydata extends Mage_Core_Model_Abstract
{
    public function  _construct()
    {
        parent::_construct();
        $this->_init('istest/mydata');
    }
}
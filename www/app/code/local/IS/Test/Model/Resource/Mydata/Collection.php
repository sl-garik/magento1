<?php
class IS_Test_Model_Resource_Mydata_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('istest/mydata');
    }
}
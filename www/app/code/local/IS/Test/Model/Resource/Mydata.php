<?php
class IS_Test_Model_Resource_Mydata extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('istest/table_istest','id');
    }
}
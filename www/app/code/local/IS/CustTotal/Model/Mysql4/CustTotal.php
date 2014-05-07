<?php
class IS_CustTotal_Model_Mysql4_CustTotal extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('custtotal/custtotal', 'id');
    }
}
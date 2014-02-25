<?php
class My_Layout_Block_Footer extends Mage_Core_Block_Template
{
    public function getDate()
    {
        $date = date('Y-m-d');
        return urlencode($date);
    }
}
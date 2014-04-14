<?php

class IS_Test_ViewController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $customer = Mage::getSingleton('customer/session');
        if ($customer->isLoggedIn()) {
            $this->loadLayout();
            $navigationBlock = $this->getLayout()->getBlock('my.account.wrapper');
            $this->getLayout()->getBlock('head')->setTitle($this->__('My Data'));
            $this->renderLayout();
        } else $this->_redirectReferer();


    }
}
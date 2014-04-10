<?php
class IS_Test_ViewController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $navigationBlock = $this->getLayout()->getBlock('my.account.wrapper');
        $this->getLayout()->getBlock('head')->setTitle($this->__('My Data'));
        $this->renderLayout();

    }

//    public function preDispatch()
//    {
//        parent::preDispatch();
//        $action = $this->getRequest()->getActionName();
//        $loginUrl = Mage::helper('customer')->getLoginUrl();
//
//        if (!Mage::getSingleton('customer/session')->authenticate($this, $loginUrl)) {
//            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
//        }
//    }
}
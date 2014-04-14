<?php
class IS_Test_Block_Myaccountdata extends Mage_Core_Block_Template
{
    public function methodblock()
    {
        return 'informations about my data:' ;
    }

    public function __construct()
    {
        parent::__construct();
        $collection = Mage::getModel('istest/mydata')->getCollection();
        $this->setCollection($collection);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $customer = Mage::getSingleton('customer/session');
        if ($customer->isLoggedIn()) {
            $this->getCollection()->addFieldToFilter('email', $customer->getCustomer()->getEmail());
            $this->getCollection()->setOrder('id', 'DESC');
            $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
            $pager->setAvailableLimit(array(5=>5,10=>10,20=>20,'all'=>'all'));
            $pager->setCollection($this->getCollection());
            $this->setChild('pager', $pager);
            $this->getCollection()->load();
        }
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}

<?php
class IS_Test_Block_Myaccountdata extends Mage_Core_Block_Template
{
    public function methodblock()
    {
        return 'informations about my data:' ;
    }

    protected function _beforeToHtml()
    {
        $collection = Mage::getModel('istest/mydata')->getCollection();
        $this->setCollection($collection);

        $customer = Mage::getSingleton('customer/session');
        if ($customer->isLoggedIn()) {
            $this->getCollection()->addFieldToFilter('email', $customer->getCustomer()->getEmail());
            $this->getCollection()->setOrder('id', 'DESC');
            $pager = $this->getChild('custom.pager');
            $pager->setCollection($this->getCollection());
        }

        return parent::_beforeToHtml();
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('custom.pager');
    }
}

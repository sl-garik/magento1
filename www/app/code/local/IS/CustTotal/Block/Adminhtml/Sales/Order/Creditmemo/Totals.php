<?php
class IS_CustTotal_Block_Adminhtml_Sales_Order_Creditmemo_Totals extends Mage_Adminhtml_Block_Sales_Order_Creditmemo_Totals
{
    protected function _initTotals()
    {
        parent::_initTotals();
        $order = $this->getOrder();
        $amt = $this->getOrder()->getFeeRefundedIS();
        $baseAmt = $this->getOrder()->getBaseFeeRefundedIS();
        if ($amt) {
            $this->addTotalBefore(new Varien_Object(array(
                'code'      => 'is_custtotal',
                'value'     => $amt,
                'base_value'=> $baseAmt,
                'label'     => 'myFee',
            ), array('shipping', 'tax')));
        }
    }
}
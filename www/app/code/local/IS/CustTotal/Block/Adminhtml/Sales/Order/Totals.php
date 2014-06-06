<?php
class IS_CustTotal_Block_Adminhtml_Sales_Order_Totals extends Mage_Adminhtml_Block_Sales_Order_Totals
{
    protected function _initTotals()
    {
        parent::_initTotals();
        $amt = $this->getSource()->getFeeIS();
        $baseAmt = $this->getSource()->getBaseFeeIS();
        if ($amt) {
            $this->addTotalBefore(new Varien_Object(array(
                'code'      => 'is_custtotal',
                'value'     => $amt,
                'base_value'=> $baseAmt,
                'label'     => 'myFee',
            )), array('shipping', 'tax'));
        }
        return $this;
    }
}
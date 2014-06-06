<?php
class IS_CustTotal_Model_Creditmemo_Total extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $order = $creditmemo->getOrder();
        $amt = $order->getFeeIS();
        $baseAmt = $order->getBaseFeeIS();
        if ($amt) {
            $order->setFeeRefundedIS($amt);
            $order->setBaseFeeRefundedIS($baseAmt);

            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $order->getFeeRefundedIs());
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $order->getBaseFeeRefundedIs());
        }
        return $this;
    }
}
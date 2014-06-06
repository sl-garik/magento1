<?php
class IS_CustTotal_Model_Invoice_Total extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $order = $invoice->getOrder();
        $amt = $order->getFeeIS();
        $baseAmt = $order->getBaseFeeIS();

        if ($amt) {
            $order->setFeeInvoicedIS($amt);
            $order->setBaseFeeInvoicedIS($baseAmt);

            $invoice->setGrandTotal($invoice->getGrandTotal() + $order->getFeeInvoicedIS());
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $order->getBaseFeeInvoicedIS());
        }
        return $this;
    }
}

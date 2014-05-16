<?php
class IS_CustTotal_Model_Invoice extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        die('model-invoice');
        $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getFeeAmount());
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getBaseFeeAmount());

        return $this;
    }
}

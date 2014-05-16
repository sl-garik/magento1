<?php

class IS_CustTotal_Model_Discount extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        if ($address->getData('address_type') == 'billing') {
            return $this;
        }
        $zipcode = $address->getData('postcode');
        $collection = Mage::getModel('custtotal/custtotal')->getCollection()->addFilter('ZipCode', $zipcode);
        $arr_zip = $collection->getData();

        if (!empty($arr_zip)) {
            $key = array_search($zipcode, $arr_zip, true);
            foreach ($arr_zip as $key => $value) {
                $discount = $value['NewPrice'];
            }
        } else {
            $discount = 0;
        }
            $grandTotal = $address->getGrandTotal();
            $baseGrandTotal = $address->getBaseGrandTotal();

            $totals = array_sum($address->getAllTotalAmounts());
            $baseTotals = array_sum($address->getAllBaseTotalAmounts());

            $address->setFeeAmount($discount);
            $address->setBaseFeeAmount($discount);

            $address->setGrandTotal($grandTotal + $address->getFeeAmount());
            $address->setBaseGrandTotal($baseGrandTotal + $address->getBaseFeeAmount());

        return $this;
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if ($address->getData('address_type') == 'billing')
            return $this;

        $amt = $address->getFeeAmount();
        if ($amt != 0) {
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => Mage::helper('custtotal')->__('Fee'),
                'value' => $amt
            ));
        }
        return $address;
    }
}
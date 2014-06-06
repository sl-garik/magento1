<?php
class IS_CustTotal_Model_Quote_Total extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function __construct()
    {
        $this->setCode('is_custtotal');
    }

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
                $amt = $value['NewPrice'];
            }
        } else {
            $amt = 0;
        }

            $grandTotal = $address->getGrandTotal();
            $baseGrandTotal = $address->getBaseGrandTotal();

            $address->setFeeIs($amt);
            $address->setBaseFeeIs($amt);

            $address->setGrandTotal($grandTotal + $address->getFeeIs());
            $address->setBaseGrandTotal($baseGrandTotal + $address->getBaseFeeIs());

        return $this;
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if ($address->getData('address_type') == 'billing')
            return $this;

        $amt = $address->getFeeIs();
        if ($amt != 0) {
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => Mage::helper('custtotal')->__('myFee'),
                'value' => $amt
            ),array('shipping', 'tax'));
        }
        return $address;
    }
}
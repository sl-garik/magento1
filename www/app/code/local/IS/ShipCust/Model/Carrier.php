<?php

class IS_ShipCust_Model_Carrier extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'is_shipcust';

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        $result = Mage::getModel('shipping/rate_result');
        /* @var $result Mage_Shipping_Model_Rate_Result */

        $result->append($this->_getCustShippingRate($request));
        return $result;
    }

    protected function _getCustShippingRate($request)
    {
        $rate = Mage::getModel('shipping/rate_result_method');
        /* @var $rate Mage_Shipping_Model_Rate_Result_Method */
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod('custome');
        $rate->setMethodTitle('Custom (different price per item)');

        $output = 0;
        foreach ($request->getAllItems() as $item) {
            $output += $item->getCustPriceShip();
        }

        $rate->setPrice($output);
        return $rate;
    }


    public function getAllowedMethods()
    {
        return array(
            'custome' => 'Custome',
        );
    }
}
<?php

class IS_ShipCust_Model_Observer
{
    public function MyAdd2Cart($observer)
    {
        $event = $observer->getEvent(); //Fetches the current event
        $quoteItem = $event->getQuoteItem();
        $product = $event->getProduct();
        $quoteItem->setCustPriceShip($product->getCustPriceShip());

        //$eventmsg = "Current Event Triggered : <I>" . $event->getName() . "</I><br/> Currently Added Product : <I> " . $product->getName()."</I>";
        $eventmsg = "Currently Added Product (Custome Shipping Price): <I> " . $product->getData('cust_price_ship') . "</I>";
        //Adds Custom message to shopping cart
        Mage::getSingleton('checkout/session')->addSuccess($eventmsg);
    }
}
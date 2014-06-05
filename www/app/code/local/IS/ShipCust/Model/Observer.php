<?php

class IS_ShipCust_Model_Observer
{
    public function MyAdd2Cart($observer)
    {
        $event = $observer->getEvent(); //Fetches the current event
        $quoteItem = $event->getQuoteItem();
        $product = $event->getProduct();
        $quoteItem->setCustPriceShip($product->getCustPriceShip());
        $prod_price = $product->getData('cust_price_ship');

        // проверка на цену доставки продука, если ее нет, то сообщения не выводить
        if (!empty($prod_price)) {
            $eventmsg = "Currently Added Product (Custome Shipping Price): <I> " . $product->getData('cust_price_ship') . "</I>";
        } else $eventmsg = '';
        //Adds Custom message to shopping cart
        Mage::getSingleton('checkout/session')->addSuccess($eventmsg);
    }
}
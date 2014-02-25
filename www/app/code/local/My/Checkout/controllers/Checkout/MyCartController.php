<?php
require_once("Mage/Checkout/controllers/CartController.php");

class My_Checkout_Checkout_CartController extends Mage_Checkout_CartController
{
    public function indexAction()
    {
        die('woops');
    }
}
<?php
class My_Test_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        //echo 'test index';
        $this->loadLayout();
        $this->renderLayout();
    }

    public function mymethodAction()
    {
        echo 'test mymethod';
    }
}
?>
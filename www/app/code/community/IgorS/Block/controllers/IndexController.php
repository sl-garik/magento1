<?php
class IgorS_Block_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
       // echo 'Woops';
        $this->loadLayout();
        $this->renderLayout();
    }

    public function addAction(){
        echo 'Foo add Action';
    }

    public function deleteAction()
    {
        echo 'Foo delete Action';
    }
}

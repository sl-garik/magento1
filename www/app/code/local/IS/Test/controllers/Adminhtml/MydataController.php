<?php
class IS_Test_Adminhtml_MydataController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Mydata'));

        $this->loadLayout();
        $this->_setActiveMenu('istest');
        $this->_addBreadcrumb(Mage::helper('istest')->__('Mydata'), Mage::helper('istest')->__('Mydata'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_title($this->__('Add new mydata'));
        $this->loadLayout();
        $this->_setActiveMenu('istest');
        $this->_addBreadcrumb(Mage::helper('istest')->__('Add new mydata'), Mage::helper('istest')->__('Add new mydata'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('istest/adminhtml_mydata_grid')->toHtml()
        );
    }

    public function deleteAction()
    {
        $tipId = $this->getRequest()->getParam('id', false);

        try {
            Mage::getModel('istest/mydata')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('istest')->__('Item successfully deleted'));

            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }

        $this->_redirectReferer();
    }

    public function massDeleteAction()
    {
        $adListingIds = $this->getRequest()->getParam('id');

        if(!is_array($adListingIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select ID item(s).'));
        } else {
            try {
                $model = Mage::getSingleton('istest/mydata');
                foreach ($adListingIds as $adId) {
                    $model->load($adId)->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Total of %d record(s) were deleted.', count($adListingIds)));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }

    public function editAction()
    {
        $this->_redirectReferer();
    }
}
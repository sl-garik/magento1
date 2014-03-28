<?php
class DS_News_Adminhtml_NewsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('News'));
        $this->loadLayout();
        $this->_setActiveMenu('dsnews');
        $this->_addBreadcrumb(Mage::helper('dsnews')->__('News'), Mage::helper('dsnews')->__('News'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_title($this->__('Add new news'));
        $this->loadLayout();
        $this->_setActiveMenu('dsnews');
        $this->_addBreadcrumb(Mage::helper('dsnews')->__('Add new news'), Mage::helper('dsnews')->__('Add new news'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__('Edit news'));
        $this->loadLayout();
        $this->_setActiveMenu('dsnews');
        $this->_addBreadcrumb(Mage::helper('dsnews')->__('Edit news'), Mage::helper('dsnews')->__('Edit news'));
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $tipId = $this->getRequest()->getParam('id', false);

        try {
            Mage::getModel('dsnews/news')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('dsnews')->__('news successfully deleted'));
            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }
        $this->_redirectReferer();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        if (!empty($data)) {
            try {
                Mage::getModel('dsnews/news')->setData($data)
                    ->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('dsnews')->__('news successfully saved'));
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
            }
        }
        return $this->_redirect('*/*/');
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('dsnews/adminhtml_news_grid')->toHtml()
        );
    }
}
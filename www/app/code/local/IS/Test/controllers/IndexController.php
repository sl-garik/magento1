<?php

class IS_Test_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        // читаем значение полей из формы
        $pol1 = $this->getRequest()->getPost('myinput1');
        $pol2 = $this->getRequest()->getPost('myinput2');
        // проверяем заполнение полей
        if (!empty($pol1) || !empty($pol2)) {
            $contact = Mage::getModel('istest/mydata');
            $contact->setData('pole1', $pol1);
            $contact->setData('pole2', $pol2);
            /**
             * если customer залогинен, то в поле "email" добавляем его email,
             * если не залогинен, то добавляем "guest"
             */
            $customer = Mage::getSingleton('customer/session');
            if ($customer->isLoggedIn()) {
                $contact->setData('email', $customer->getCustomer()->getEmail());
            } else {
                $contact->setData('email', 'guest');
            }
            // сохраняем форму
            $contact->save();
        }
        // редиректит откуда пришли
        $this->_redirectReferer();
    }
}
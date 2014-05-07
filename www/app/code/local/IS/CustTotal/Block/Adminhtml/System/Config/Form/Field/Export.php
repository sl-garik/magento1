<?php
class IS_CustTotal_Block_Adminhtml_System_Config_Form_Field_Export extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    public  function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement($element);
        $url = $this->getUrl('catalog/product');
        $html = $this->getLayout()->createBlock('adminhtml/widget_button')
            ->setType('button')
            ->setLabel('Export')
            ->setOnClick("setLocation('$url')")
            ->toHtml();
        return $html;
    }
}
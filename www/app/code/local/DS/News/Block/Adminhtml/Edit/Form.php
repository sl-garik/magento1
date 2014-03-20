<?php
class DS_News_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $news = Mage::registry('current_news');
        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('news_form', array(
            'legend' => Mage::helper('dsnews')->__('News Details')
        ));

        if ($news->getId()) {
            $fieldset->addField('news_id', 'hidden', array(
                'name'      => 'news_id',
                'required'  => true
            ));
        }

        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('dsnews')->__('Title'),
            'required' => true,
            'name' => 'title',
        ));

        $fieldset->addField('content', 'editor', array(
            'label' => Mage::helper('dsnews')->__('Content'),
            'required' => true,
            'name' => 'content',
        ));

        $fieldset->addField('created', 'date', array(
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'label' => Mage::helper('dsnews')->__('Created'),
            'name' => 'created'
        ));

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->setValues($news->getData());

        $this->setForm($form);
    }
}
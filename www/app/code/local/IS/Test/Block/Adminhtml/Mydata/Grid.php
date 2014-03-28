<?php
class IS_Test_Block_Adminhtml_Mydata_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
        $this->setId('istest');
        $this->_controller = 'adminhtml_mydata';
        $this->setUseAjax(true);

        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('istest/mydata')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'        => Mage::helper('istest')->__('ID'),
            'align'         => 'right',
            'width'         => '20px',
            'filter_index'  => 'id',
            'index'         => 'id'
        ));

        $this->addColumn('pole1', array(
            'header'        => Mage::helper('istest')->__('Pole1'),
            'align'         => 'left',
            'filter_index'  => 'pole1',
            'index'         => 'pole1',
            'type'          => 'text',
            'truncate'      => 50,
            'escape'        => true,
        ));

        $this->addColumn('pole2', array(
            'header'        => Mage::helper('istest')->__('Pole2'),
            'align'         => 'left',
            'filter_index'  => 'pole2',
            'index'         => 'pole2',
            'type'          => 'text',
            'truncate'      => 50,
            'escape'        => true,
        ));

        $this->addColumn('email', array(
            'header'        => Mage::helper('istest')->__('email'),
            'align'         => 'left',
            'filter_index'  => 'email',
            'index'         => 'email',
            'type'          => 'text',
            'truncate'      => 50,
            'escape'        => true,
        ));


        $this->addColumn('action', array(
            'header'    => Mage::helper('freaks_quotes')->__('Action'),
            'width'     => '50px',
            'type'      => 'action',
            'getter'     => 'getId',
            'actions'   => array(
                array(
                    'caption' => Mage::helper('freaks_quotes')->__('Delete'),
                    'url'     => array(
                        'base'=>'*/*/delete',
                    ),
                    'field'   => 'id'
                )
            ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'id',
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($mydata)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $mydata->getId(),
        ));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id_item');
        $this->getMassactionBlock()->setFormFieldName('id');
        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> $this->__('Delete'),
            'url'  => $this->getUrl('*/*/massDelete', array('' => '')),
            'confirm' => $this->__('Are you sure you want to delete the selected item(s)?')
        ));
        return $this;
    }
}
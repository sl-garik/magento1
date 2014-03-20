<?php
class DS_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
        $this->setId('newsGrid');
        $this->_controller = 'adminhtml_news';
        $this->setUseAjax(true);

        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('dsnews/news')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('news_id', array(
            'header'        => Mage::helper('dsnews')->__('News ID'),
            'align'         => 'right',
            'width'         => '20px',
            'filter_index'  => 'news_id',
            'index'         => 'news_id'
        ));

        $this->addColumn('title', array(
            'header'        => Mage::helper('dsnews')->__('Title'),
            'align'         => 'left',
            'filter_index'  => 'title',
            'index'         => 'title',
            'type'          => 'text',
            'truncate'      => 50,
            'escape'        => true,
        ));

        $this->addColumn('content', array(
            'header'        => Mage::helper('dsnews')->__('Content'),
            'align'         => 'left',
            'filter_index'  => 'content',
            'index'         => 'content',
            'type'          => 'text',
        ));

        $this->addColumn('created', array(
            'header' => Mage::helper('dsnews')->__('Created'),
            'index' => 'created',
            'type' => 'date',
        ));

        $this->addColumn('action', array(
            'header'    => Mage::helper('dsnews')->__('Action'),
            'width'     => '50px',
            'type'      => 'action',
            'getter'     => 'getId',
            'actions'   => array(
                array(
                    'caption' => Mage::helper('dsnews')->__('Edit'),
                    'url'     => array(
                        'base'=>'*/*/edit',
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

    public function getRowUrl($news)
    {
        return $this->getUrl('*/*/edit', array(
            'news_id' => $news->getId(),
        ));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}
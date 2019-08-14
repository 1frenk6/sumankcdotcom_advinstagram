<?php
/**
 * Sumankcdotcom_AdvInstagram extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Sumankcdotcom
 * @package        Sumankcdotcom_AdvInstagram
 * @copyright      Copyright (c) 2016
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Post admin grid block
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * constructor
     *
     * @access public
     * @author Suman K.C [SUMANKC.COM]
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('postGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * prepare collection
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Grid
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('sumankcdotcom_advinstagram/post')
            ->getCollection();
        
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * prepare grid collection
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Grid
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'entity_id',
            array(
                'header' => Mage::helper('sumankcdotcom_advinstagram')->__('Id'),
                'index'  => 'entity_id',
                'type'   => 'number'
            )
        );
        $this->addColumn(
            'media_id',
            array(
                'header'    => Mage::helper('sumankcdotcom_advinstagram')->__('Media Id'),
                'align'     => 'left',
                'index'     => 'media_id',
            )
        );
        
        $this->addColumn(
            'status',
            array(
                'header'  => Mage::helper('sumankcdotcom_advinstagram')->__('Status'),
                'index'   => 'status',
                'type'    => 'options',
                'options' => array(
                    '1' => Mage::helper('sumankcdotcom_advinstagram')->__('Enabled'),
                    '0' => Mage::helper('sumankcdotcom_advinstagram')->__('Disabled'),
                )
            )
        );
        $this->addColumn(
            'username',
            array(
                'header' => Mage::helper('sumankcdotcom_advinstagram')->__('Link'),
                'index'  => 'username',
                'type'=> 'text',

            )
        );
        $this->addColumn(
            'caption',
            array(
                'header' => Mage::helper('sumankcdotcom_advinstagram')->__('Caption'),
                'index'  => 'caption',
                'type'=> 'text',

            )
        );
        if (!Mage::app()->isSingleStoreMode() && !$this->_isExport) {
            $this->addColumn(
                'store_id',
                array(
                    'header'     => Mage::helper('sumankcdotcom_advinstagram')->__('Store Views'),
                    'index'      => 'store_id',
                    'type'       => 'store',
                    'store_all'  => true,
                    'store_view' => true,
                    'sortable'   => false,
                    'filter_condition_callback'=> array($this, '_filterStoreCondition'),
                )
            );
        }
        $this->addColumn(
            'created_at',
            array(
                'header' => Mage::helper('sumankcdotcom_advinstagram')->__('Created at'),
                'index'  => 'created_at',
                'width'  => '120px',
                'type'   => 'datetime',
            )
        );
        $this->addColumn(
            'updated_at',
            array(
                'header'    => Mage::helper('sumankcdotcom_advinstagram')->__('Updated at'),
                'index'     => 'updated_at',
                'width'     => '120px',
                'type'      => 'datetime',
            )
        );
        $this->addColumn(
            'action',
            array(
                'header'  =>  Mage::helper('sumankcdotcom_advinstagram')->__('Action'),
                'width'   => '100',
                'type'    => 'action',
                'getter'  => 'getId',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('sumankcdotcom_advinstagram')->__('Edit'),
                        'url'     => array('base'=> '*/*/edit'),
                        'field'   => 'id'
                    )
                ),
                'filter'    => false,
                'is_system' => true,
                'sortable'  => false,
            )
        );
        $this->addExportType('*/*/exportCsv', Mage::helper('sumankcdotcom_advinstagram')->__('CSV'));
        $this->addExportType('*/*/exportExcel', Mage::helper('sumankcdotcom_advinstagram')->__('Excel'));
        $this->addExportType('*/*/exportXml', Mage::helper('sumankcdotcom_advinstagram')->__('XML'));
        return parent::_prepareColumns();
    }

    /**
     * prepare mass action
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Grid
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('post');
        $this->getMassactionBlock()->addItem(
            'delete',
            array(
                'label'=> Mage::helper('sumankcdotcom_advinstagram')->__('Delete'),
                'url'  => $this->getUrl('*/*/massDelete'),
                'confirm'  => Mage::helper('sumankcdotcom_advinstagram')->__('Are you sure?')
            )
        );
        $this->getMassactionBlock()->addItem(
            'status',
            array(
                'label'      => Mage::helper('sumankcdotcom_advinstagram')->__('Change status'),
                'url'        => $this->getUrl('*/*/massStatus', array('_current'=>true)),
                'additional' => array(
                    'status' => array(
                        'name'   => 'status',
                        'type'   => 'select',
                        'class'  => 'required-entry',
                        'label'  => Mage::helper('sumankcdotcom_advinstagram')->__('Status'),
                        'values' => array(
                            '1' => Mage::helper('sumankcdotcom_advinstagram')->__('Enabled'),
                            '0' => Mage::helper('sumankcdotcom_advinstagram')->__('Disabled'),
                        )
                    )
                )
            )
        );
        return $this;
    }

    /**
     * get the row url
     *
     * @access public
     * @param Sumankcdotcom_AdvInstagram_Model_Post
     * @return string
     * @author Suman K.C [SUMANKC.COM]
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * get the grid url
     *
     * @access public
     * @return string
     * @author Suman K.C [SUMANKC.COM]
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

    /**
     * after collection load
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Grid
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _afterLoadCollection()
    {
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }

    /**
     * filter store column
     *
     * @access protected
     * @param Sumankcdotcom_AdvInstagram_Model_Resource_Post_Collection $collection
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     * @return Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Grid
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _filterStoreCondition($collection, $column)
    {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        $collection->addStoreFilter($value);
        return $this;
    }
}

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
 * Post admin edit tabs
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Initialize Tabs
     *
     * @access public
     * @author Suman K.C [SUMANKC.COM]
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('post_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('sumankcdotcom_advinstagram')->__('Post'));
    }

    /**
     * before render html
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Edit_Tabs
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'form_post',
            array(
                'label'   => Mage::helper('sumankcdotcom_advinstagram')->__('Post'),
                'title'   => Mage::helper('sumankcdotcom_advinstagram')->__('Post'),
                'content' => $this->getLayout()->createBlock(
                    'sumankcdotcom_advinstagram/adminhtml_post_edit_tab_form'
                )
                ->toHtml(),
            )
        );
        if (!Mage::app()->isSingleStoreMode()) {
            $this->addTab(
                'form_store_post',
                array(
                    'label'   => Mage::helper('sumankcdotcom_advinstagram')->__('Store views'),
                    'title'   => Mage::helper('sumankcdotcom_advinstagram')->__('Store views'),
                    'content' => $this->getLayout()->createBlock(
                        'sumankcdotcom_advinstagram/adminhtml_post_edit_tab_stores'
                    )
                    ->toHtml(),
                )
            );
        }
        return parent::_beforeToHtml();
    }

    /**
     * Retrieve post entity
     *
     * @access public
     * @return Sumankcdotcom_AdvInstagram_Model_Post
     * @author Suman K.C [SUMANKC.COM]
     */
    public function getPost()
    {
        return Mage::registry('current_post');
    }
}

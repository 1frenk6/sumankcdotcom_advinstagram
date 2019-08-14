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
 * Post admin edit form
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * constructor
     *
     * @access public
     * @return void
     * @author Suman K.C [SUMANKC.COM]
     */
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup = 'sumankcdotcom_advinstagram';
        $this->_controller = 'adminhtml_post';
        $this->_updateButton(
            'save',
            'label',
            Mage::helper('sumankcdotcom_advinstagram')->__('Save Post')
        );
        $this->_updateButton(
            'delete',
            'label',
            Mage::helper('sumankcdotcom_advinstagram')->__('Delete Post')
        );
        $this->_addButton(
            'saveandcontinue',
            array(
                'label'   => Mage::helper('sumankcdotcom_advinstagram')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class'   => 'save',
            ),
            -100
        );
        $this->_formScripts[] = "
            function saveAndContinueEdit() {
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * get the edit form header
     *
     * @access public
     * @return string
     * @author Suman K.C [SUMANKC.COM]
     */
    public function getHeaderText()
    {
        if (Mage::registry('current_post') && Mage::registry('current_post')->getId()) {
            return Mage::helper('sumankcdotcom_advinstagram')->__(
                "Edit Post '%s'",
                $this->escapeHtml(Mage::registry('current_post')->getMediaId())
            );
        } else {
            return Mage::helper('sumankcdotcom_advinstagram')->__('Add Post');
        }
    }
}

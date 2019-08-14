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
 * Post edit form tab
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * prepare the form
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Edit_Tab_Form
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('post_');
        $form->setFieldNameSuffix('post');
        $this->setForm($form);
        $fieldset = $form->addFieldset(
            'post_form',
            array('legend' => Mage::helper('sumankcdotcom_advinstagram')->__('Post'))
        );

        $fieldset->addField(
            'media_id',
            'text',
            array(
                'label' => Mage::helper('sumankcdotcom_advinstagram')->__('Media Id'),
                'name'  => 'media_id',
                'required'  => true,
                'class' => 'required-entry',

           )
        );

        $fieldset->addField(
            'username',
            'text',
            array(
                'label' => Mage::helper('sumankcdotcom_advinstagram')->__('Link'),
                'name'  => 'username',
                'required'  => true,
                'class' => 'required-entry',

           )
        );

        $fieldset->addField(
            'caption',
            'text',
            array(
                'label' => Mage::helper('sumankcdotcom_advinstagram')->__('Caption'),
                'name'  => 'caption',
                'required'  => true,
                'class' => 'required-entry',

           )
        );
        $fieldset->addField(
            'status',
            'select',
            array(
                'label'  => Mage::helper('sumankcdotcom_advinstagram')->__('Status'),
                'name'   => 'status',
                'values' => array(
                    array(
                        'value' => 1,
                        'label' => Mage::helper('sumankcdotcom_advinstagram')->__('Enabled'),
                    ),
                    array(
                        'value' => 0,
                        'label' => Mage::helper('sumankcdotcom_advinstagram')->__('Disabled'),
                    ),
                ),
            )
        );
        if (Mage::app()->isSingleStoreMode()) {
            $fieldset->addField(
                'store_id',
                'hidden',
                array(
                    'name'      => 'stores[]',
                    'value'     => Mage::app()->getStore(true)->getId()
                )
            );
            Mage::registry('current_post')->setStoreId(Mage::app()->getStore(true)->getId());
        }
        $formValues = Mage::registry('current_post')->getDefaultValues();
        if (!is_array($formValues)) {
            $formValues = array();
        }
        if (Mage::getSingleton('adminhtml/session')->getPostData()) {
            $formValues = array_merge($formValues, Mage::getSingleton('adminhtml/session')->getPostData());
            Mage::getSingleton('adminhtml/session')->setPostData(null);
        } elseif (Mage::registry('current_post')) {
            $formValues = array_merge($formValues, Mage::registry('current_post')->getData());
        }
        $form->setValues($formValues);
        return parent::_prepareForm();
    }
}

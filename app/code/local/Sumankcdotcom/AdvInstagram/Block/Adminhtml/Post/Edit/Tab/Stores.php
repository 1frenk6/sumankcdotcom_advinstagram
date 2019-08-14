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
 * store selection tab
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Edit_Tab_Stores extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * prepare the form
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post_Edit_Tab_Stores
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $form->setFieldNameSuffix('post');
        $this->setForm($form);
        $fieldset = $form->addFieldset(
            'post_stores_form',
            array('legend' => Mage::helper('sumankcdotcom_advinstagram')->__('Store views'))
        );
        $field = $fieldset->addField(
            'store_id',
            'multiselect',
            array(
                'name'     => 'stores[]',
                'label'    => Mage::helper('sumankcdotcom_advinstagram')->__('Store Views'),
                'title'    => Mage::helper('sumankcdotcom_advinstagram')->__('Store Views'),
                'required' => true,
                'values'   => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            )
        );
        $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
        $field->setRenderer($renderer);
        $form->addValues(Mage::registry('current_post')->getData());
        return parent::_prepareForm();
    }
}

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
 * Post admin block
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Block_Adminhtml_Post extends Mage_Adminhtml_Block_Widget_Grid_Container
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
        $this->_controller         = 'adminhtml_post';
        $this->_blockGroup         = 'sumankcdotcom_advinstagram';
        parent::__construct();
        $this->_headerText         = Mage::helper('sumankcdotcom_advinstagram')->__('Post');
        $this->_updateButton('add', 'label', Mage::helper('sumankcdotcom_advinstagram')->__('Add Post'));

    }
}

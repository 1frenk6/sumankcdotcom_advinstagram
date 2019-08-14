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
 * Post front contrller
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_PostController extends Mage_Core_Controller_Front_Action
{

    /**
      * default action
      *
      * @access public
      * @return void
      * @author Suman K.C [SUMANKC.COM]
      */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_initLayoutMessages('catalog/session');
        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('checkout/session');
        if (Mage::helper('sumankcdotcom_advinstagram/post')->getUseBreadcrumbs()) {
            if ($breadcrumbBlock = $this->getLayout()->getBlock('breadcrumbs')) {
                $breadcrumbBlock->addCrumb(
                    'home',
                    array(
                        'label' => Mage::helper('sumankcdotcom_advinstagram')->__('Home'),
                        'link'  => Mage::getUrl(),
                    )
                );
                $breadcrumbBlock->addCrumb(
                    'posts',
                    array(
                        'label' => Mage::helper('sumankcdotcom_advinstagram')->__('Posts'),
                        'link'  => '',
                    )
                );
            }
        }
        $headBlock = $this->getLayout()->getBlock('head');
        if ($headBlock) {
            $headBlock->addLinkRel('canonical', Mage::helper('sumankcdotcom_advinstagram/post')->getPostsUrl());
        }
        $this->renderLayout();
    }
}

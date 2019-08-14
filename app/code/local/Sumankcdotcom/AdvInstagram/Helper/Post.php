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
 * Post helper
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Helper_Post extends Mage_Core_Helper_Abstract
{

    /**
     * get the url to the posts list page
     *
     * @access public
     * @return string
     * @author Suman K.C [SUMANKC.COM]
     */
    public function getPostsUrl()
    {
        if ($listKey = Mage::getStoreConfig('sumankcdotcom_advinstagram/post/url_rewrite_list')) {
            return Mage::getUrl('', array('_direct'=>$listKey));
        }
        return Mage::getUrl('sumankcdotcom_advinstagram/post/index');
    }

    /**
     * check if breadcrumbs can be used
     *
     * @access public
     * @return bool
     * @author Suman K.C [SUMANKC.COM]
     */
    public function getUseBreadcrumbs()
    {
        return Mage::getStoreConfigFlag('sumankcdotcom_advinstagram/post/breadcrumbs');
    }
}

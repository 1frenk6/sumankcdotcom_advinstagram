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
 * Post list block
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Block_Post_List extends Mage_Core_Block_Template
{
    /**
     * initialize
     *
     * @access public
     * @author Suman K.C [SUMANKC.COM]
     */
    public function _construct()
    {
        parent::_construct();
        $posts = Mage::getResourceModel('sumankcdotcom_advinstagram/post_collection')
                         ->addStoreFilter(Mage::app()->getStore())
                         ->addFieldToFilter('status', 1)
                         ->setPageSize(100)
                         ->setOrder('created_at', 'desc'); 
        $posts->setOrder('media_id', 'asc');
        $this->setPosts($posts);
    }

    /**
     * prepare the layout
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Block_Post_List
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->getPosts()->load();
        return $this;
    }

    /**
     * get the pager html
     *
     * @access public
     * @return string
     * @author Suman K.C [SUMANKC.COM]
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}

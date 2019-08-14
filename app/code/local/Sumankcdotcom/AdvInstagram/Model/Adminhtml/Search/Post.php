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
 * Admin search model
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Model_Adminhtml_Search_Post extends Varien_Object
{
    /**
     * Load search results
     *
     * @access public
     * @return Sumankcdotcom_AdvInstagram_Model_Adminhtml_Search_Post
     * @author Suman K.C [SUMANKC.COM]
     */
    public function load()
    {
        $arr = array();
        if (!$this->hasStart() || !$this->hasLimit() || !$this->hasQuery()) {
            $this->setResults($arr);
            return $this;
        }
        $collection = Mage::getResourceModel('sumankcdotcom_advinstagram/post_collection')
            ->addFieldToFilter('media_id', array('like' => $this->getQuery().'%'))
            ->setCurPage($this->getStart())
            ->setPageSize($this->getLimit())
            ->load();
        foreach ($collection->getItems() as $post) {
            $arr[] = array(
                'id'          => 'post/1/'.$post->getId(),
                'type'        => Mage::helper('sumankcdotcom_advinstagram')->__('Post'),
                'name'        => $post->getMediaId(),
                'description' => $post->getMediaId(),
                'url' => Mage::helper('adminhtml')->getUrl(
                    '*/advinstagram_post/edit',
                    array('id'=>$post->getId())
                ),
            );
        }
        $this->setResults($arr);
        return $this;
    }
}

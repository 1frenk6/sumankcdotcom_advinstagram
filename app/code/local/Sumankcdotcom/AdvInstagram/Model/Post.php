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
 * Post model
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
class Sumankcdotcom_AdvInstagram_Model_Post extends Mage_Core_Model_Abstract
{
    /**
     * Entity code.
     * Can be used as part of method name for entity processing
     */
    const ENTITY    = 'sumankcdotcom_advinstagram_post';
    const CACHE_TAG = 'sumankcdotcom_advinstagram_post';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'sumankcdotcom_advinstagram_post';

    /**
     * Parameter name in event
     *
     * @var string
     */
    protected $_eventObject = 'post';

    /**
     * constructor
     *
     * @access public
     * @return void
     * @author Suman K.C [SUMANKC.COM]
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('sumankcdotcom_advinstagram/post');
    }

    /**
     * before save post
     *
     * @access protected
     * @return Sumankcdotcom_AdvInstagram_Model_Post
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _beforeSave()
    {
        parent::_beforeSave();
        $now = Mage::getSingleton('core/date')->gmtDate();
        if ($this->isObjectNew()) {
            $this->setCreatedAt($now);
        }
        $this->setUpdatedAt($now);
        return $this;
    }

    /**
     * save post relation
     *
     * @access public
     * @return Sumankcdotcom_AdvInstagram_Model_Post
     * @author Suman K.C [SUMANKC.COM]
     */
    protected function _afterSave()
    {
        return parent::_afterSave();
    }

    /**
     * get default values
     *
     * @access public
     * @return array
     * @author Suman K.C [SUMANKC.COM]
     */
    public function getDefaultValues()
    {
        $values = array();
        $values['status'] = 1;
        return $values;
    }
    
}

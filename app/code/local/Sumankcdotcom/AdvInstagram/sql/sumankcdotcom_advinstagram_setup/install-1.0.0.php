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
 * AdvInstagram module install script
 *
 * @category    Sumankcdotcom
 * @package     Sumankcdotcom_AdvInstagram
 * @author      Suman K.C [SUMANKC.COM]
 */
$this->startSetup();
$table = $this->getConnection()
    ->newTable($this->getTable('sumankcdotcom_advinstagram/post'))
    ->addColumn(
        'entity_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'identity'  => true,
            'nullable'  => false,
            'primary'   => true,
        ),
        'Post ID'
    )
    ->addColumn(
        'media_id',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(
            'nullable'  => false,
        ),
        'Media Id'
    )
    ->addColumn(
        'username',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(
            'nullable'  => false,
        ),
        'Username'
    )
    ->addColumn(
        'caption',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(
            'nullable'  => false,
        ),
        'Caption'
    )
    ->addColumn(
        'status',
        Varien_Db_Ddl_Table::TYPE_SMALLINT, null,
        array(),
        'Enabled'
    )
    ->addColumn(
        'updated_at',
        Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
        null,
        array(),
        'Post Modification Time'
    )
    ->addColumn(
        'created_at',
        Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
        null,
        array(),
        'Post Creation Time'
    ) 
    ->setComment('Post Table');
$this->getConnection()->createTable($table);
$table = $this->getConnection()
    ->newTable($this->getTable('sumankcdotcom_advinstagram/post_store'))
    ->addColumn(
        'post_id',
        Varien_Db_Ddl_Table::TYPE_SMALLINT,
        null,
        array(
            'nullable'  => false,
            'primary'   => true,
        ),
        'Post ID'
    )
    ->addColumn(
        'store_id',
        Varien_Db_Ddl_Table::TYPE_SMALLINT,
        null,
        array(
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ),
        'Store ID'
    )
    ->addIndex(
        $this->getIdxName(
            'sumankcdotcom_advinstagram/post_store',
            array('store_id')
        ),
        array('store_id')
    )
    ->addForeignKey(
        $this->getFkName(
            'sumankcdotcom_advinstagram/post_store',
            'post_id',
            'sumankcdotcom_advinstagram/post',
            'entity_id'
        ),
        'post_id',
        $this->getTable('sumankcdotcom_advinstagram/post'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $this->getFkName(
            'sumankcdotcom_advinstagram/post_store',
            'store_id',
            'core/store',
            'store_id'
        ),
        'store_id',
        $this->getTable('core/store'),
        'store_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->setComment('Posts To Store Linkage Table');
$this->getConnection()->createTable($table);
$this->endSetup();

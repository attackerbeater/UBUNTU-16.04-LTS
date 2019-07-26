<?php
namespace AcmeWidgets\Setup\Setup;

/**
* SET foreign_key_checks = 0;
* DELETE FROM setup_module WHERE module = "AcmeWidgets_Setup";
* DROP TABLE user_login;
* DROP TABLE user_registration;
* SET foreign_key_checks = 1;
*/

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Db\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface {

  public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){

    $setup->startSetup();

    // user login
    $connection = $setup->getConnection();
    $table_name = 'user_login';
    if(!$setup->tableExists($table_name)){
      $table = $connection->newTable($setup->getTable($table_name))
      ->addColumn(
        'user_id',Table::TYPE_INTEGER,null,
        ['identity' => true, 'nullable' => false, 'unsigned' => true, 'primary' => true],
        'Login ID'
      )
      ->addColumn(
        'email',Table::TYPE_TEXT,255,
        ['nullable' => false],
        'Login Email'
      )
      ->addColumn(
        'password',Table::TYPE_TEXT,255,
        ['nullable' => false],
        'Login Password'
      )
      ->addIndex(
        $setup->getIdxName($table_name, ['email', 'password'], AdapterInterface::INDEX_TYPE_UNIQUE),
        ['email', 'password'],
        ['type'=>AdapterInterface::INDEX_TYPE_UNIQUE]
      )
      ->setComment('User Login Table');
      $connection->createTable($table);
    }

    // table registration
    $connection = $setup->getConnection();
    $table_name = 'user_registration';
    if(!$setup->tableExists($table_name)){
      $table = $connection->newTable($setup->getTable($table_name))
      ->addColumn(
        'registration_id', Table::TYPE_INTEGER, null,
        ['identity' => true, 'nullable' => false,'unsigned' => true,'primary' => true],
        'Registration ID'
      )
      ->addColumn(
        'user_id',
        Table::TYPE_INTEGER,
        null,
        ['nullable' => false, 'unsigned' => true],
        'Login ID'
      )
      ->addColumn(
        'first_name', Table::TYPE_INTEGER, null, ['nullable' => false, 'unsigned' => true],
        'First name'
      )
      ->addColumn(
        'last_name', Table::TYPE_INTEGER, null, ['nullable' => false, 'unsigned' => true],
        'Last name'
      )
      ->addIndex(
        $setup->getIdxName($table_name, ['first_name', 'last_name'], AdapterInterface::INDEX_TYPE_UNIQUE),
        ['first_name', 'last_name'],
        ['type'=>AdapterInterface::INDEX_TYPE_UNIQUE]
      )
      ->addForeignKey(
        $setup->getFkName($table_name, 'user_id', 'user_login', 'user_id'),
        'user_id',
        $setup->getTable('user_login'),
        'user_id',
        Table::ACTION_CASCADE
      )
      ->setComment('User Registration Table');
      $connection->createTable($table);
    }

    $setup->endSetup();
  }
}

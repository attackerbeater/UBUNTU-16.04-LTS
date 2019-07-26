<?php
namespace AcmeWidgets\ProductPromoter\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {

  /**
   * Installs DB schema for a module
   *
   * @param SchemaSetupInterface $setup
   * @param ModuleContextInterface $context
   * @return void
   */
  public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
    $setup->startSetup();

    $table = $setup->getConnection()
      ->newTable($setup->getTable('acmewidgets_productpromoter'))
      ->addColumn(
          'entity_id',
          \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
          null,
          ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
          'Entity ID'
      )
      ->addColumn(
          'name',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          64,
          [],
          'Name'
      )
      ->setComment('AcmeWidgets ProductPromoter Table');
    $setup->getConnection()->createTable($table);   

    $setup->endSetup();
  }

}

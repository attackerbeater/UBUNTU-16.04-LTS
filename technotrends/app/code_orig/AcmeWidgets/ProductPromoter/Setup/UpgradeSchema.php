<?php
namespace AcmeWidgets\ProductPromoter\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements  UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup,
                            ModuleContextInterface $context){
      $setup->startSetup();
      if (version_compare($context->getVersion(), '1.0.1') < 0) {

        $quote = $setup->getTable('quote');
        $sales_order = $setup->getTable('sales_order');

        // Check if the table already exists
        if ($setup->getConnection()->isTableExists($quote) == true && $setup->getConnection()->isTableExists($sales_order) == true) {

          // Add shipping address field
          $columns = [
            'salutations' => [
              'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
              'nullable' => true,
              'comment' => 'Salutations'
            ]
          ];
          $connection = $setup->getConnection();
          foreach($columns as $name => $definition) {
            $connection->addColumn($quote, $name, $definition);
            $connection->addColumn($sales_order, $name, $definition);
          }
        }
      }

      $setup->endSetup();
    }
}

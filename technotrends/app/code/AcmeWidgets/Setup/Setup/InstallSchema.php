<?php 

namespace AcmeWidgets\Setup\Setup;

// 	SET foreign_key_checks = 0;
// DELETE FROM setup_module WHERE module = "AcmeWidgets_Setup";
// DROP TABLE user_info;
// DROP TABLE meeting_details;
// DROP TABLE customer1;
// DROP TABLE agents;
// SET foreign_key_checks = 1;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Db\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface {

	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
		$setup->startSetup();

		$this->userInfo($setup);
		$this->meetingDetails($setup);	
		$this->customer1($setup);	
		$this->agents($setup);

		$setup->endSetup();
	}

	public function userInfo($setup){
		$tableName = 'user_info';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'user_id',
					Table::TYPE_INTEGER,
					null,
					[
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'User ID'

				)
			->addColumn(
					'department',
					Table::TYPE_TEXT,
					64,
					[
						'unsigned'=>true,
						'nullable'=>false
					],
					'Department'
				)
			->setComment('User Info Table');
			$connection->createTable($table);
		}
	}

	public function meetingDetails($setup){
		$tableName = 'meeting_details';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'meeting_id',
					Table::TYPE_INTEGER,
					null,
					[
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'Meeting ID'

				)
			->addColumn(
					'user_id',
					Table::TYPE_INTEGER,
					null,
					[
						'unsigned'=>true,
						'nullable'=>false
					],
					'User ID'	
				)
			->addColumn(
					'called_by',
					Table::TYPE_TEXT,
					64,
					[
						'unsigned'=>true,
						'nullable'=>false
					],
					'Called By'
				)
			->addIndex(
					$setup->getIdxName($tableName, ['called_by'],AdapterInterface::INDEX_TYPE_UNIQUE),
					['called_by'],
					['type'=>AdapterInterface::INDEX_TYPE_UNIQUE]

				)
			->addForeignKey(
					$setup->getFkName(
							$tableName, 'user_id', 'user_info', 'user_id'
						),
					'user_id',
					$setup->getTable('user_info'),
					'user_id',
					Table::ACTION_CASCADE
				)	
			->setComment('Meeting Details Table');
			$connection->createTable($table);
		}
	
	}

	public function customer1($setup){
		$tableName = 'customer1';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'cust_code',
					Table::TYPE_INTEGER,
					null,
					[
						'identity'=>true,
						'nullable'=>false,
						'unsigned'=>true,
						'primary' =>true
					],
					'Cust Code'
				)
			->addColumn(
					'agent_code',
					Table::TYPE_TEXT,
					64,
					[	
						'unsigned' =>true,
						'nullable' => false
					],
					'Agent Code'

				)
			->addIndex(
					$setup->getIdxName($tableName, ['agent_code'],AdapterInterface::INDEX_TYPE_UNIQUE),
					['agent_code'],
					['type'=>AdapterInterface::INDEX_TYPE_UNIQUE]
				)
			->setComment('Customer 1 Table');
			$connection->createTable($table);

		}
	} 

	public function agents($setup){
		$tableName = 'agents';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'agent_id',
					Table::TYPE_INTEGER,
					null,
					[
						'identity'=>true,
						'nullable'=>false,
						'unsigned'=>true,
						'primary' =>true
					],
					'Cust Code'
				)
			->addColumn(
					'cust_code',
					Table::TYPE_INTEGER,
					null,
					['nullable' => false, 'unsigned' => true],
					'Cust Code'
				)
			->addColumn(
					'agent_name',
					Table::TYPE_TEXT,
					64,
					[	
						'unsigned' =>true,
						'nullable' => false
					],
					'Agent Code'
				)
			->addIndex(
					$setup->getIdxName($tableName, ['agent_name'],AdapterInterface::INDEX_TYPE_UNIQUE),
					['agent_name'],
					['type'=>AdapterInterface::INDEX_TYPE_UNIQUE]
				)
			->addForeignKey(
					$setup->getFkName(
						$tableName, 'cust_code', 'customer1', 'cust_code'
					),
					'cust_code',
					$setup->getTable('customer1'),
					'cust_code'		,
					Table::ACTION_CASCADE			
				)
			->setComment('Customer 1 Table');
			$connection->createTable($table);

		}
	} 



}
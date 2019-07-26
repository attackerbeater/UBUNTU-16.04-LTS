<?php 

namespace AcmeWidgets\Setup\Setup;

// SET foreign_key_checks = 0;
// DELETE FROM setup_module WHERE module = "AcmeWidgets_Setup";
// DROP TABLE salaries;
// DROP TABLE employees;
// DROP TABLE dept_manager;
// DROP TABLE titles;
// DROP TABLE dept_emp;
// DROP TABLE departments;
// SET foreign_key_checks = 1;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Db\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface {

	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
		$setup->startSetup();

		$this->salaries($setup);
		$this->employees($setup);	
		$this->deptManager($setup);	
		$this->titles($setup);
		$this->deptEmp($setup);
		$this->departments($setup);

		$setup->endSetup();
	}

	public function salaries($setup){
		$tableName = 'salaries';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'emp_no',
					Table::TYPE_INTEGER,
					null,
					[
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'Employee number'

				)
			->addColumn(
					'salary',
					Table::TYPE_INTEGER,
					null,
					[				
						'nullable' =>false,
						'unsigned' =>true					
					],
					'Salary'

				)
			->addColumn(
					'from_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'From Date'
				)
			->addColumn(
					'to_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'To Date'
				)
			->addForeignKey(
					$setup->getFkName(
							$tableName, 'emp_no', 'employees', 'emp_no'
						),
					'emp_no',
					$setup->getTable('employees'),
					'emp_no',
					Table::ACTION_CASCADE
				)	
			->setComment('Salaries Table');
			$connection->createTable($table);
		}
	}

	public function employees($setup){
		$tableName = 'employees';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'emp_no',
					Table::TYPE_INTEGER,
					null,
					[
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'Employee Number'

				)
			->addColumn(
					'birth_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'Birth Date'	
				)
			->addColumn(
					'first_name',
					Table::TYPE_TEXT,
					64,
					[
						'unsigned'=>true,
						'nullable'=>false
					],
					'First Name'
				)
			->addColumn(
					'last_name',
					Table::TYPE_TEXT,
					64,
					[
						'unsigned'=>true,
						'nullable'=>false
					],
					'Last Name'
				)
			->addColumn(
					'gender',
					Table::TYPE_TEXT,
					64,
					[
						'unsigned'=>true,
						'nullable'=>false
					],
					'Gender'
				)
			->addColumn(
					'hire_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'Hire Date'	
				)
			->addIndex(
					$setup->getIdxName($tableName, ['first_name', 'last_name'],AdapterInterface::INDEX_TYPE_INDEX),
					['first_name', 'last_name'],
					['type'=>AdapterInterface::INDEX_TYPE_INDEX]

				)			
			->setComment('Employees Table');
			$connection->createTable($table);
		}

	}

	public function deptManager($setup){
		$tableName = 'dept_manager';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'dept_no',
					Table::TYPE_INTEGER,
					4,
					[],
					'Department Number'

				)
			->addColumn(
					'emp_no',
					Table::TYPE_INTEGER,
					null,
					[
						
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'Employee Number'	
				)
			->addColumn(
					'from_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'From Date'	
				)
			->addColumn(
					'to_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'To Date'
				)			
			->addForeignKey(
					$setup->getFkName(
							$tableName, 'emp_no', 'employees', 'emp_no'
						),
					'emp_no',
					$setup->getTable('employees'),
					'emp_no',
					Table::ACTION_CASCADE
				)	
			->addForeignKey(
					$setup->getFkName(
							$tableName, 'dept_no', 'departments', 'dept_no'
						),
					'dept_no',
					$setup->getTable('departments'),
					'dept_no',
					Table::ACTION_CASCADE
				)	
			->setComment('Department Manager Table');
			$connection->createTable($table);
		}
	}

	public function titles($setup){
		$tableName = 'titles';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'emp_no',
					Table::TYPE_INTEGER,
					null,
					[
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'Employee Number'

				)
			->addColumn(
					'title',
					Table::TYPE_TEXT,
					50,
					[						
						'primary' =>true
					],
					'Title'	
				)
			->addColumn(
					'from_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'From Date'	
				)
			->addColumn(
					'to_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'To Date'
				)	
			->addForeignKey(
					$setup->getFkName(
							$tableName, 'emp_no', 'employees', 'emp_no'
						),
					'emp_no',
					$setup->getTable('employees'),
					'emp_no',
					Table::ACTION_CASCADE
				)				
			->setComment('Meeting Details Table');
			$connection->createTable($table);
		}
	}

	public function deptEmp($setup){
		$tableName = 'dept_emp';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'emp_no',
					Table::TYPE_INTEGER,
					4,
					[
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'Employee Number'

				)
			->addColumn(
					'dept_no',
					Table::TYPE_INTEGER,
					4,
					[
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'Department Number'	
				)
			->addColumn(
					'from_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'From Date'	
				)
			->addColumn(
					'to_date',
					Table::TYPE_TIMESTAMP,
					null,
					[],
					'To Date'
				)	
			->addForeignKey(
					$setup->getFkName(
							$tableName, 'emp_no', 'employees', 'emp_no'
						),
					'emp_no',
					$setup->getTable('employees'),
					'emp_no',
					Table::ACTION_CASCADE
				)		
			->addForeignKey(
					$setup->getFkName(
							$tableName, 'dept_no', 'departments', 'dept_no'
						),
					'dept_no',
					$setup->getTable('departments'),
					'dept_no',
					Table::ACTION_CASCADE
				)						
			->setComment('Department Employee Table');
			$connection->createTable($table);
		}
	}

	public function departments($setup){
		$tableName = 'departments';
		if(!$setup->tableExists($tableName)){
			$connection = $setup->getConnection();
			$table = $connection->newTable($setup->getTable($tableName))
			->addColumn(
					'dept_no',
					Table::TYPE_INTEGER,
					4,
					[
						'identity' =>true,
						'nullable' =>false,
						'unsigned' =>true,
						'primary' =>true
					],
					'Department Number'

				)
			->addColumn(
					'dept_name',
					Table::TYPE_TEXT,
					40,
					[],
					'Department Name'	
				)
			->setComment('Departments Table');
			$connection->createTable($table);
		}
	}
	

}
<?php



class ProductMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProductMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('product');
		$tMap->setPhpName('Product');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('PRODUCT_GROUP_ID', 'ProductGroupId', 'int', CreoleTypes::INTEGER, 'product_group', 'ID', false, null);

		$tMap->addColumn('MIMETYPE', 'Mimetype', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ICON', 'Icon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PRIORITY', 'Priority', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('STATE', 'State', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 
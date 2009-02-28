<?php



class ProductGroupMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProductGroupMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('product_group');
		$tMap->setPhpName('ProductGroup');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ALIAS', 'Alias', 'string', CreoleTypes::VARCHAR, false, 20);

	} 
} 
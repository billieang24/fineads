<?php //-->

class Portfolio extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($image) {
		$this->_database
			->model()
			->setImageName($image)
			->save('portfolio');
		
		return $this;
	}
	
	public function getList() {
		return $this->_database
			->search('portfolio')
			->getRows();
	}
}
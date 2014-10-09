<?php //-->

class Projects extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($code) {
		$this->_database
			->model()
			->setCode($code)
			->save('projects');
		
		return $this;
	}
	
	public function getDetail($code) {
		return $this->_database->getRow('projects',  'code', $code);
	}
}
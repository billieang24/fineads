<?php //-->

class Projects extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($code, $type, $height, $width, $quantity, $face, $name) {
		$this->_database
			->model()
			->setProjectName($name)
			->setCode($code)
			->setType($type)
			->setHeight($height)
			->setWidth($width)
			->setQuantity($quantity)
			->setFace($face)
			->save('projects');
		
		return $this;
	}
	
	public function getDetail($code) {
		return $this->_database->getRow('projects',  'code', $code);
	}
}
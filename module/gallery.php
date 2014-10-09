<?php //-->

class Gallery extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($image, $code) {
		$this->_database
			->model()
			->setCode($code)
			->setImageName($image)
			->save('gallery');
		return $this;
	}
	
	public function getList($code) {
		return $this->_database
			->search('gallery')
			->addFilter('code = \''.$code.'\'')
			->getRows();
	}
}
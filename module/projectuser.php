<?php //-->

class Projectuser extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($code, $user) {
		$this->_database
			->model()
			->setCode($code)
			->setUserId($user)
			->save('projectuser');
		
		return $this;
	}
	
	public function getDetail($id) {
		return $this->_database->getRow('projectuser', 'user_id', $id);
	}

	public function getList($user) {
		return $this->_database
			->search('projectuser')
			->addFilter('user_id = \''.$user.'\'')
			->getRows();
	}	
}
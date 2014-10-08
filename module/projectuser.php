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

	// public function getList($user, $pass) {
	// }

	public function getList($user) {
		return $this->_database
			->search('projectuser')
			->addFilter('user_id = \''.$user.'\'')
			->getRows();
	}	
	// public function getDetail($user, $pass) {
	// 	return $this->_database
	// 		->search('admins')
	// 		->addFilter('username = \''.$user.'\'')
	// 		->addFilter('password = \''.$pass.'\'')
	// 		->getRow();
	// }

	// public function getDetailByUid($uid) {
	// 	return $this->_database->getRow('user', 'uid', $uid);
	// }
	
	// public function update($id, $name, $email) {
	// 	$this->_database
	// 		->model()
	// 		->setUserId($id)
	// 		->setUserName($name)
	// 		->setUserEmail($email)
	// 		->save('user');
		
	// 	return $this;
	// }
	
	// public function remove($id) {
	// 	$this->_database
	// 		->model()
	// 		->setUserId($id)
	// 		->remove('user');
		
	// 	return $this;
	// }
}
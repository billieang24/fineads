<?php //-->

class Admins extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($user, $pass) {
		$this->_database
			->model()
			->setUsername($user)
			->setPassword($pass)
			->save('admins');
		
		return $this;
	}
	
	// public function getList($user, $pass) {
	// }
	
	public function getDetail($user, $pass) {
		return $this->_database
			->search('admins')
			->addFilter('username = \''.$user.'\'')
			->addFilter('password = \''.$pass.'\'')
			->getRow();
	}

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
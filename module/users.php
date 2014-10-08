<?php //-->

class Users extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($username, $password, $lname, $fname, $mname, $address, $email, $contact) {
		$this->_database
			->model()
			->setUsername($username)
			->setPassword($password)
			->setLname($lname)
			->setFname($fname)
			->setMname($mname)
			->setAddress($address)
			->setEmail($email)
			->setContactno($contact)
			->setUserCreated(date('Y-m-d H:i:s'))
			->save('users');
				
		return $this;
	}
	
	// public function getList($start, $end) {
	// 	return $this->_database
	// 		->search('user')
	// 		->innerJoinOn('freetime','user_id=freetime_user')
	// 		->leftJoinOn('booked','booked_freetime=freetime_id')
	// 		->addFilter('booked_freetime is null')
	// 		->addFilter('(freetime_start between \''.$start.'\' and \''.$end.'\')'.
	// 			' and (freetime_end between \''.$start.'\' and \''.$end.'\')')
	// 		->setGroup('user_id')
	// 		->getRows();
	// }
	
	public function getDetail($user, $pass) {
		return $this->_database
			->search('users')
			->addFilter('username = \''.$user.'\'')
			->addFilter('password = \''.$pass.'\'')
			->getRow();
	}

	public function getDetailById($id) {
		return $this->_database->getRow('users', 'user_id', $id);
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
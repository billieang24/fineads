<?php //-->

class Messages extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($name, $email, $content) {
		$this->_database
			->model()
			->setSenderName($name)
			->setSenderEmail($email)
			->setContent($content)
			->setDateCreated(time())
		    ->formatTime('date_created', 'Y-m-d')
			->setViewed(0)
			->save('messages');
		
		return $this;
	}
	
	public function getUnviewed() {
		return $this->_database
			->search('messages')
			->addFilter('viewed = 0')
			->getRow();
	}

	public function getList() {
		return $this->_database
			->search('messages')
			->getRows();
	}

	public function setViewed() {
		return $this->_database
		->updateRows('messages',array('viewed' => 1),'viewed =0');
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
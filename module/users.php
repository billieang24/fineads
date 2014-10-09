<?php //-->

class Users extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($username, $password, $lname, $fname, $mname, $address, $email, $contact, $role) {
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
			->setIsadmin($role)
			->setUserCreated(date('Y-m-d H:i:s'))
			->save('users');
				
		return $this;
	}

	public function getDetail($user, $pass, $role) {
		return $this->_database
			->search('users')
			->addFilter('username = \''.$user.'\'')
			->addFilter('password = \''.$pass.'\'')
			->addFilter('isadmin = \''.$role.'\'')
			->getRow();
	}

	public function getDetailById($id) {
		return $this->_database->getRow('users', 'user_id', $id);
	}
}
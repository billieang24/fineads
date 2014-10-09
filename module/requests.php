<?php //-->

class Requests extends Eden_Class {
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
			->save('requests');
		
		return $this;
	}
	
	public function getUnviewed() {
		return $this->_database
			->search('requests')
			->addFilter('viewed = 0')
			->getRow();
	}

	public function getList() {
		return $this->_database
			->search('requests')
			->getRows();
	}

	public function setViewed() {
		return $this->_database
		->updateRows('requests',array('viewed' => 1),'viewed =0');
	}
}
<?php //-->

class Messages extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($sender, $code, $content) {
		$this->_database
			->model()
			->setSender($sender)
			->setProject($code)
			->setContent($content)
			->save('messages');
		
		return $this;
	}

	public function getList($code) {
		return $this->_database
			->search('messages')
			->addInnerJoinOn('users', 'sender = user_id')
			->addFilter('project = \''.$code.'\'')
			->getRows();
	}
}
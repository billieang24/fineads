<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Requests extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/requests.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (!isset($_SESSION['admin'])) {
			header('Location: login');
		}
		if (isset($_GET['logout'])){
			session_destroy();
			header('Location: login');
		}
		if (isset($_POST['project'])) {
			eden('mail')->smtp(
			'smtp.gmail.com', 
			'jestine.banagbanag@gmail.com', 
			'jestine123', 
			465, true)
			->setSubject('Registration Code')
			->setBody('<p>'.$_POST['project'].'</p>', true)
			->setBody($_POST['project'])
			->addTo($_POST['email'])
			->send()
			->disconnect(); 
		}
		front()->requests()->setViewed();
		$projects = front()->projectuser()->getList($_SESSION['admin']);
		$requests = front()->requests()->getList();
		$this->_body = array(
			'projects'	=>	$projects,
			'requests'	=>	$requests);
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
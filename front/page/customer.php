<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Customer extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/customer.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (!isset($_SESSION['customer'])) {
			header('Location: /');
		}
		if (isset($_GET['logout'])) {
			session_destroy();
			header('Location: /');
		}
		if (isset($_POST['message'])) {
			front()->messages()->create($_SESSION['customer'], $_POST['code'], $_POST['message']);
		}
		$projectuser = front()->projectuser()->getDetail($_SESSION['customer']);
		if (isset($_GET['code'])) {
			$projectuser['code'] = $_GET['code']; 
		}
		$this->_body = array(
			'code'		=>	$projectuser['code'],
			'projects'	=>	front()->projectuser()->getList($_SESSION['customer']),
			'messages'	=>	front()->messages()->getList($projectuser['code']),
			'user'		=>	front()->users()->getDetailById($_SESSION['customer']));
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
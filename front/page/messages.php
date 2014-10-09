<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Messages extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/messages.phtml';
	
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
		if (isset($_GET['logout'])) {
			session_destroy();
			header('Location: login');
		}
		if (isset($_POST['message'])) {
			front()->messages()->create($_SESSION['admin'], $_POST['code'], $_POST['message']);
		}
		$projectuser = front()->projectuser()->getDetail($_SESSION['admin']);
		if (isset($_GET['code'])) {
			$projectuser['code'] = $_GET['code']; 
		}
		$this->_body = array(
			'code'		=>	$projectuser['code'],
			'projects'	=>	front()->projectuser()->getList($_SESSION['admin']),
			'messages'	=>	front()->messages()->getList($projectuser['code']),
			'user'		=>	front()->users()->getDetailById($_SESSION['admin']));
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
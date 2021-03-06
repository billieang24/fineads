<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Login extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/login.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (isset($_SESSION['admin'])) {
			header('Location: admin');
		}
		if (isset($_POST['username'])) {
			$user = front()->users()->getDetail($_POST['username'], $_POST['password'], 1);
			if (!empty($user)) {
				$_SESSION['admin'] = $user['user_id'];
				header('Location: admin');
			}
			else {
				$this->_body['invalid'] = true;
			}
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
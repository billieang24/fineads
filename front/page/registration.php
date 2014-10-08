<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Registration extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/registration.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (isset($_SESSION['customer'])) {
			header('Location: customer');
		}
		if (isset($_POST['username'])) {
			front()->users()->create(
				$_POST['username'],
				$_POST['password'],
				$_POST['lname'],
				$_POST['fname'],
				$_POST['mname'],
				$_POST['address'],
				$_POST['email'],
				$_POST['contact'],
				$_POST['code']);
			header('Location: customer');
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
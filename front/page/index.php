<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Index extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/index.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		$portfolio = front()->portfolio()->getList();
		$this->_body = array(
			'portfolio' => $portfolio);
		if (isset($_POST['name'])) {
			front()->requests()->create($_POST['name'],$_POST['email'],$_POST['content']);
		}
		if (isset($_POST['username'])) {
			if(front()->users()->getDetail($_POST['username'],$_POST['password'])) {
				$user = front()->users()->getDetail($_POST['username'],$_POST['password']);
				$_SESSION['customer'] = $user['user_id'];
				header('Location: customer');
			}	
			else {
				return "invalid username or password";
			}
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
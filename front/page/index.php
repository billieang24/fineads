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
		if (isset($_POST['name'])) {
			front()->requests()->create($_POST['name'],$_POST['email'],$_POST['content']);
		}
		if (isset($_POST['username'])) {
			if(front()->users()->getDetail($_POST['username'],$_POST['password'],0)) {
				$user = front()->users()->getDetail($_POST['username'],$_POST['password'],0);
				$_SESSION['customer'] = $user['user_id'];
				header('Location: customer');
			}	
			else{
				$error ="invalid username or password";
			}
		}

		if (isset($_POST['code'])) {
			if(front()->projects()->getDetail($_POST['code'])) {
				front()->users()->create(
					$_POST['username'],
					$_POST['password'],
					$_POST['lname'],
					$_POST['fname'],
					$_POST['mname'],
					$_POST['address'],
					$_POST['email'],
					$_POST['contact'],
					0);
				$user = front()->users()->getDetail($_POST['username'],$_POST['password'],0);
				front()->projectuser()->create($_POST['code'], $user['user_id']);
				$_SESSION['customer'] = $user['user_id'];
				header('Location: customer');
			}
			else{
				$error ="invalid code";
			}

		};
		$this->_body = array('error'=> isset($error)?$error:null,'portfolio' => $portfolio);
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
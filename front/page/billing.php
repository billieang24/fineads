<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Billing extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/billing.phtml';
	
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
		$portfolio = front()->portfolio()->getList();
		$this->_body = array(
			'portfolio' => $portfolio);
		if (isset($_POST['name'])) {
			front()->messages()->create($_POST['name'],$_POST['email'],$_POST['content']);
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
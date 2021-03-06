<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Portfolio extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'admin';
	protected $_template = '/portfolio.phtml';
	
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
		if (isset($_FILES['image'])){
			move_uploaded_file(
				$_FILES['image']['tmp_name'],
				dirname(__FILE__).'/../../web/images/'.$_FILES['image']['name']);
			front()
				->portfolio()
				->create(
					$_FILES['image']['name']);
			return "true";
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
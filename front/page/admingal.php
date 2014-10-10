<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Admingal extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/admingal.phtml';
	
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
		if (isset($_POST['project'])) {
			move_uploaded_file(
				$_FILES['image']['tmp_name'],
				dirname(__FILE__).'/../../web/images/'.$_FILES['image']['name']."-".str_replace('/tmp/',"",($_FILES['image']['tmp_name'])));
			front()->gallery()->create($_POST['project'],'/images/'.$_FILES['image']['name']."-".str_replace('/tmp/',"",($_FILES['image']['tmp_name'])));
		}
		$codes = front()->projectuser()->getList($_SESSION['admin']);
		$this->_body = array('codes' => $codes);
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
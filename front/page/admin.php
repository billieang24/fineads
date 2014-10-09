<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Admin extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/admin.phtml';
	
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
		if (isset($_POST['setviewed'])) {
			front()->requests()->setViewed();
		}
		// $test = front()->trigger('mail',1,2,3);
		$hour = date('h') * rand(1,3);
		$month = date('m') * rand(1,5);
		$minute = date('i');
		$date = date('d') * rand(1,2);
		$second = date('s');
		$code = "";
		$tmp = array($hour, $month, $minute, $date, $second);
		foreach($tmp as $key => $value) {
			if ($value < 11) {
				$tmp[$key] = $value + 47;
			}
			else if ($value < 37) {
				$tmp[$key] = $value + 54;
			}
			else if ($value < 63) {
				$tmp[$key] = $value + 60;
			}
			else {
				$tmp[$key] = $value + 50;
			}
			$code{$key} = chr($tmp[$key]); 
		}
		$unviewed = front()->requests()->getUnviewed();
		$this->_body = array(
			'unviewed'	=>	$unviewed);
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
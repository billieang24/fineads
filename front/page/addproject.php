<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Addproject extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/addproject.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if(isset($_POST['name'])) {
			$hour = date('h') * rand(1,3);
			$month = date('m') * rand(1,5);
			$minute = date('i');
			$date = date('d') * rand(1,2);
			$second = date('s');
			$code = array();
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
				$code[] = chr($tmp[$key]); 
			}
			front()->projects()->create(
				implode("", $code),
				$_POST['type'],
				$_POST['height'],
				$_POST['width'],
				$_POST['quantity'],
				$_POST['face'],
				$_POST['name']);
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
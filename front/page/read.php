<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Read extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/read.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		$filename = 'data.txt';
		$last = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;
		$current = filemtime($filename);

		while( $current <= $last) {
			usleep(100000);
			clearstatcache();
			$current = filemtime($filename);
		}
		
		$response = array();
		$response['msg'] = file_get_contents($filename);
		$response['timestamp'] = $current;
		echo json_encode($response);	
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
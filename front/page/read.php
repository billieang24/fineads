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
	protected $_template = '/requests.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		$file = $_GET['code'];
		$filename = dirname(__FILE__).'/'.$file.'.txt';
		$last = (isset($_GET['timestamp']) ? $_GET['timestamp'] : 0);
		$current = filemtime($filename);
		usleep(100000);
		clearstatcache();
		$response['code'] = $_GET['code'];
		$response['msg'] = file_get_contents($filename);
		return json_encode($response);	
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
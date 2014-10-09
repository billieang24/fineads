<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Write extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Fine Ads';
	protected $_class = 'index';
	protected $_template = '/write.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		$msg = $_GET['msg'];
		$file = $_GET['code'];
		$handle = fopen(dirname(__FILE__).'/'.$file.'.txt', 'a');
		fwrite($handle, $msg);
		fclose($handle);
		exit;
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
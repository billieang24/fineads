<?php //-->
class Event_Mail {
	public function __construct() {
		front()->listen('mail', $this, 'notify');
	}
	
	public function notify() {
		eden('mail')->smtp(
			'smtp.gmail.com', 
			'jestine.banagbanag@gmail.com', 
			'jestine123', 
			465, true)
			->setSubject('Registration Code')
			->setBody('<p>test</p>', true)
			->setBody('test')
			->addTo('billieang24@gmail.com')
			->send()
			->disconnect(); 
	}
}
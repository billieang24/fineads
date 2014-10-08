<?php //-->
class Event_Mail {
	public function __construct() {
		front()->listen('new-post', $this, 'notify');
	}
	
	public function notify($control, $event, $post) {
		eden('mail')->smtp(
			'smtp.gmail.com', 
			'jestine.banagbanag@gmail.com', 
			'jestine123', 
			465, true)
			->setSubject('New Post - '.$post['post_title'])
			->setBody($post['post_detail'], true)
			->setBody($post['post_detail'])
			->addTo('cblanquera@openovate.com')
			->addTo('jdalmario@gmail.com')
			->send()
			->disconnect(); 
	}
}
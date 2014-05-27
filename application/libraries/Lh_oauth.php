<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

include(APPPATH.'libraries/facebook/facebook.php');

class Lh_oauth extends Facebook {
	public $CI;
	
	//private $default_scopes = array('scope' => 'user_about_me, user_activities, user_likes, user_website, email, user_events, user_groups');
	
	public $user = null;
	public $user_id = null;
		
	public function __construct() {
		$this->CI =& get_instance();
		
		$conf = $this->CI->config->item('facebook');
		parent::__construct($conf);
		
		$this->user_id = $this->getUser();
		$me = null;
		if ($this->user_id) {
			try {
				$me = $this->api('/me');
				$this->user = $me;
			} catch (FacebookApiException $e) {
				error_log($e);
			}
		}
	}
}
/* EOF */
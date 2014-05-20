<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

include(APPPATH.'libraries/facebook/facebook.php');

class Lh_oauth extends Facebook {
	public $CI;
	
	//private $default_scopes = array('scope' => 'user_about_me, user_activities, user_likes, user_website, email, user_events, user_groups');
	
	public $user = null;
	public $user_id = null;
	
	//public $fb = false;
	//public $fbSession = false;
	//public $appkey = 0;
	
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
	/*
	public function addScope($str = "") {
		if (strlen($str) > 3) {
			$e = explode(',', $this->default_scopes['scope']);
			$e[] = $str;
			$this->default_scopes['scope'] = implode(',', $e);
		}
	}
	
	protected function getCode() {
		if (isset($_GET['code'])) {
			if ($this->state !== null &&
				isset($_GET['state']) &&
				$this->state === $_GET['state']) {
				// CSRF state has done its job, so clear it
				$this->state = null;
				$this->clearPersistentData('state');
				return $_GET['code'];
			} else {
				self::errorLog('CSRF state token does not match one provided.');
				return false;
			}
		}
		
		return false;
	}
	
	public function getSignedRequest() {
		if (!$this->signedRequest) {
			if (isset($_GET['signed_request'])) {
				$this->signedRequest = $this->parseSignedRequest($_GET['signed_request']);
			} else if (isset($_COOKIE[$this->getSignedRequestCookieName()])) {
				$this->signedRequest = $this->parseSignedRequest($_COOKIE[$this->getSignedRequestCookieName()]);
			}
		}
		return $this->signedRequest;
	}
	
	public function getLoginUrl($params = array()) {
		$params = array_merge($params, $this->default_scopes);
		return parent::getLoginUrl($params);
	}
	*/
}
/* EOF */
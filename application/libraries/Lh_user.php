<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Lh_user {
	public $CI;
	private $metadata = null;
	
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function add($userdata = array()) {
		if (empty($userdata)) return false;

		$this->CI->db->trans_start();
			
			$user_id = $this->CI->User_model->create($userdata);
			
		$this->CI->db->trans_complete();
		
		if ($this->CI->db->trans_status()) {
			return true;
		} else {
			return false;
		}
	}
	
	public function edit($userdata = array(), $where = array()) {
		$this->CI->db->trans_start();
			// TODO
		$this->CI->db->trans_complete();
		if ($this->CI->db->trans_status()) {
			return true;
		} else {
			return false;
		}
	}
	
	public function get($key) {
		return ($value = $this->CI->session->userdata($key)) ? $value : '';
	}
	
	public function set($key, $value = null) {
		return $this->CI->session->set_userdata($key, $value);
	}
	
	public function set_flashdata($key, $value = null) {
		return $this->CI->session->set_flashdata($key, $value);
	}
	
	public function delete($key) {
		return $this->CI->session->unset_userdata($key);
	}
}
/* EOF */
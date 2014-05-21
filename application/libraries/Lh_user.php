<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Lh_user {
	public $CI;
	private $metadata = null;
	
	public function __construct() {
		$this->CI =& get_instance();
		
		// $this->CI->load->model('User_metadata_model');
		// $this->CI->load->model('User_metadata_field_model');
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
		// $user = array();
		// $metadata = array();
		// foreach ($userdata as $k => $v) {
		// 	if (in_array($k, array('location', '...'))) {
		// 		$user[$k] = $v;
		// 		$this->set($k, $v);
		// 	} else if (in_array($k, array('...'))) {
		// 		$metadata[$k] = $v;
		// 	}
		// }
		// $this->CI->db->trans_start();
		// 	if (!empty($user)) {
		// 		$this->CI->User_model->update($user, $where);
		// 	}
		// 	if (!empty($metadata)) {
		// 		foreach($metadata as $mk => $md) {
		// 			$field_id = $this->CI->User_metadata_field_model->find_one(array('key' => $mk))->id;
		// 			$this->CI->User_metadata_model->update(array('data' => $md), array('user_id' => $where['id'],'user_metadata_field_id' => $field_id));
		// 		}
		// 	}
		// $this->CI->db->trans_complete();
		
		// if ($this->CI->db->trans_status()) {
		// 	return true;
		// } else {
		// 	return false;
		// }
	}
	
	public function deactivate($user_id, $message = null) {
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

	public function get_profile_image($user_id = null) {
		// if (is_null($user_id)) $user_id = $this->get('id');
		// $profile = $this->CI->User_model->with('user_metadata_fields', 'user_metadata_field_id')->columns('user_metadatas.data')->find_one(array('user_metadatas.user_id' => $user_id, 'user_metadata_fields.key' => 'profile_image'))->data;
		// if (!empty($profile)) {
		// 	$path = $this->CI->config->item('profile_path') .'/'. $profile;
		// } else {
		// 	$path = $this->CI->config->item('profile_path') .'/avatar.png';
		// }
		// return $path;
	}
}
/* EOF */
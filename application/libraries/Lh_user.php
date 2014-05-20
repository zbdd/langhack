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
		$user = array();
		$metadata = array();
		foreach ($userdata as $k => $v) {
			if (in_array($k, array('type_code_id', 'email', 'password', 'nickname', 'mypage_url', 'bio', 'status'))) {
				$user[$k] = $v;
			} else if (in_array($k, array('subject_option', 'profile_image', 'auto_creation', 'description', 'facebook_link'))) {
				$metadata[$k] = $v;
			}
		}
		
		$this->CI->db->trans_start();
			
			// users
			$user_id = $this->CI->User_model->create($user);
			// user_metadatas
			foreach ($metadata as $mk => $mv) {
				$field_id = $this->CI->User_metadata_field_model->find_one(array('key' => $mk))->id;
				$this->CI->User_metadata_model->create(array(
					'user_id' => $user_id,
					'user_metadata_field_id' => $field_id,
					'data' => $mv
				));
			}
			
		$this->CI->db->trans_complete();
		
		if ($this->CI->db->trans_status()) {
			return true;
		} else {
			return false;
		}
	}
	
	public function edit($userdata = array(), $where = array()) {
		$user = array();
		$metadata = array();
		foreach ($userdata as $k => $v) {
			if (in_array($k, array('nickname', 'mypage_url', 'bio'))) {
				$user[$k] = $v;
				$this->set($k, $v);
			} else if (in_array($k, array('subject_option', 'profile_image', 'auto_creation', 'description', 'facebook_link'))) {
				$metadata[$k] = $v;
			}
		}
		
		$this->CI->db->trans_start();
			
			// 유저
			if (!empty($user)) {
				$this->CI->User_model->update($user, $where);
			}
			// 메타데이터
			if (!empty($metadata)) {
				foreach($metadata as $mk => $md) {
					$field_id = $this->CI->User_metadata_field_model->find_one(array('key' => $mk))->id;
					$this->CI->User_metadata_model->update(array('data' => $md), array('user_id' => $where['id'],'user_metadata_field_id' => $field_id));
				}
			}
			
		$this->CI->db->trans_complete();
		
		if ($this->CI->db->trans_status()) {
			return true;
		} else {
			return false;
		}
	}
	
	public function deactivate($user_id, $message = null) {
		/* TODO 회원 비활성화 후 남은 데이터 처리
		 * 0. 회원 status를 N로 변경 / audit 로그
		 * 1. 유저 팔로우 관계는 모두 삭제
		 * 2. 소유한 노트는 보관?
		 * 3. 작성한 해설/댓글도 보관?
		 */
		//$this->CI->load->model('User_follow_model');
		$this->CI->load->model('Audit_model');
		$this->CI->db->trans_start();
			$this->CI->User_model->update(array('status' => 'N'), array('id' => $user_id));
			$this->CI->Audit_model->create(array(
				'user_id' 	=> $user_id,
				'target'	=> 'users',
				'target_id'	=> $user_id,
				'action'	=> 'deactivate',
				'data'		=> $message
			));
			//$this->CI->User_follow_model->delete('owner_id = '.$user_id.' OR target_id = '.$user_id);
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
	/*
	public function set_profile_image($user_id, $attachment_id) {
		$this->CI->load->model('Attachment_model');
		$this->CI->db->trans_start();
			// 기존 설정된 첨부파일 이미지의 reference를 날림
			$this->CI->Attachment_model->update(array('reference' => null, 'reference_id' => null), array('reference' => 'users', 'reference_id' => $user_id));
			// 새로운 첨부파일 이미지 reference 등록
			$this->CI->Attachment_model->update(array('reference' =>'users', 'reference_id' => $user_id), array('id' => $attachment_id));
		$this->CI->db->trans_complete();
		return $this->CI->db->trans_status();
	}
	*/
	public function get_profile_image($user_id = null) {
		if (is_null($user_id)) $user_id = $this->get('id');
		$profile = $this->CI->User_metadata_model->with('user_metadata_fields', 'user_metadata_field_id')->columns('user_metadatas.data')->find_one(array('user_metadatas.user_id' => $user_id, 'user_metadata_fields.key' => 'profile_image'))->data;
		if (!empty($profile)) {
			$path = $this->CI->config->item('profile_path') .'/'. $profile;
		} else {
			$path = $this->CI->config->item('profile_path') .'/avatar.png';
		}
		return $path;
	}
}
/* EOF */
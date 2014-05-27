<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Lh_authenticate {
	public $CI;
	
	public function __construct() {
		$this->CI =& get_instance();
		
		$this->CI->load->library('encrypt');
		if (!function_exists('password_hash')) $this->CI->load->helper('password');
	}
	
	/**
	 * 로그인 루틴
	 * 
	 * 사용자가 입력한 이메일, 패스워드로 일치하는 사용자 정보가 있는지 검사해서 로그인 루틴을 수행.
	 * 
	 * @access	public
	 * @param	string	사용자 입력 이메일
	 * @param	string	비밀번호
	 * @return	boolean
	 */
	public function login($email, $password) {
		if ( (empty($email) || empty($password)) ) return false;
		
		if ($result = $this->CI->User_model->find_one(array('email' => $email))) {
			if (password_verify($password, $result->password)) {
				$this->CI->lh_user->set(array(
					'id'			=> $result->id,
					'email' 		=> $result->email,
					'firstname'		=> $result->firstname,
					'lastname'		=> $result->lastname,
					'profile'		=> $result->profile
				));
				// update last login time
				$this->update_last_login($result->id);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function signup_login($email) {
		if (empty($email)) return false;
		if ($result = $this->CI->User_model->find_one(array('email' => $email))) {
			$this->CI->lh_user->set(array(
				'id'			=> $result->id,
				'email' 		=> $result->email,
				'firstname'		=> $result->firstname,
				'lastname'		=> $result->lastname,
				'profile'		=> $result->profile
			));
			$this->update_last_login($result->id);
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 최종 로그인 시간 업데이트
	 * 
	 * 최종 로그인 시간을 업데이트한다.
	 * 
	 * @access	public
	 * @param	integer	사용자 아이디
	 * @return	boolean
	 */		
	public function update_last_login($user_id) {
		return $this->CI->User_model->update(array('last_login_at' => date('Y-m-d H:i:s')), array('id' => $user_id));
	}
	
	/**
	 * 로그아웃 루틴
	 * 
	 * 사용자 세션을 파괴
	 * 
	 * @access	public
	 * @return	void
	 */
	public function logout() {
		$this->CI->session->sess_destroy();
	}
}
/* EOF */
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Lh_authenticate {
	public $CI;
	
	public function __construct() {
		$this->CI =& get_instance();
		
		$this->CI->load->library('encrypt');
		if (!function_exists('password_hash')) $this->CI->load->helper('password');
	}
	
	public function m_login($email, $password) {
		if ( (empty($email) || empty($password)) ) return false;
		$this->CI->load->model('User_access_token_model');
		if ($result = $this->CI->User_model->find_one(array('email' => $email, 'status' => 'Y'))) {
			if (password_verify($password, $result->password)) {
				$new_token = md5(uniqid($result->email, true));
				if ($this->CI->User_access_token_model->is_exists(array('user_id' => $result->id))) {
					$this->CI->User_access_token_model->update(array('access_token' => $new_token), array('user_id' => $result->id));
				} else {
					$this->CI->User_access_token_model->create(array('user_id' => $result->id, 'access_token' => $new_token));
				}
				$this->update_last_login($result->id);
				return array('id' => $result->id, 'name' => $result->nickname, 'token' => $new_token);
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	public function m_oauth_login($email) {
		if (empty($email)) return false;
		$this->CI->load->model('User_access_token_model');
		if ($result = $this->CI->User_model->find_one(array('email' => $email, 'status' => 'Y'))) {
			$new_token = md5(uniqid($result->email, true));
			if ($this->CI->User_access_token_model->is_exists(array('user_id' => $result->id))) {
				$this->CI->User_access_token_model->update(array('access_token' => $new_token), array('user_id' => $result->id));
			} else {
				$this->CI->User_access_token_model->create(array('user_id' => $result->id, 'access_token' => $new_token));
			}
			$this->update_last_login($result->id);
			return array('id' => $result->id, 'name' => $result->nickname, 'token' => $new_token);
		} else {
			return false;
		}
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
		
		if ($result = $this->CI->User_model->with('type_codes', 'type_code_id')->columns('users.*, type_codes.key AS type_code_key')->find_one(array('users.email' => $email, 'users.status' => 'Y'))) {
			if (password_verify($password, $result->password)) {
				$this->CI->odab_user->set(array(
					'id'			=> $result->id,
					'type_code_key'	=> $result->type_code_key,
					'email' 		=> $result->email,
					'nickname'		=> $result->nickname,
					'bio'			=> $result->bio,
					'mypage_url'	=> $result->mypage_url
				));
				
				// update last login time
				$this->update_last_login($result->id);
				return true;
			} else {
				//$this->CI->odab_user->set(array('id' => 1));
				//$this->CI->odab_user->delete(array_keys(array('email', 'password')));
				return false;
			}
		} else {
			//$this->CI->odab_user->set(array('id' => 1));
			//$this->CI->odab_user->delete(array_keys(array('email', 'password')));
			return false;
		}
	}
	
	public function signup_login($email) {
		if (empty($email)) return false;
		if ($result = $this->CI->User_model->columns('users.*')->find_one(array('users.email' => $email))) {
			$this->CI->odab_user->set(array(
				'id'			=> $result->id,
				'email' 		=> $result->email,
				'firstname'		=> $result->firstname,
				'lastname'		=> $result->lastname
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
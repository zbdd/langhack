<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Authenticate extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->lh_view->set_frame('index');
		$this->lh_view->set_partial('header', 'modules/header');
		$this->lh_view->set_partial('footer', 'modules/footer');
	}

	public function oauth_facebook() {
		$this->load->library('lh_oauth');
		$oauth_user = $this->lh_oauth->user;
		if ($oauth_user) {
			if ($this->User_model->is_exists(array('email' => $oauth_user['email']))) {
				if ($this->lh_authenticate->signup_login($oauth_user['email'])) {
					redirect('/');
				} else {
					redirect('/');
				}
			} else {
				// save profile image
				$fb_img = file_get_contents('https://graph.facebook.com/'.$oauth_user['id'].'/picture?width=160&height=160');
				$upload_path = $this->config->item('img_path');
				$fb_file = $_SERVER['DOCUMENT_ROOT'].$upload_path .'/'. md5($oauth_user['id']) . '.jpg';
				file_put_contents($fb_file, $fb_img);
				// continue registration based on fb info
				$userdata = array(
					'user_email' 	=> $oauth_user['email'],
					'user_fname' 	=> $oauth_user['first_name'],
					'user_lname'	=> $oauth_user['last_name'],
					'user_profile'	=> str_replace($_SERVER['DOCUMENT_ROOT'], '', $fb_file)
				);
				$this->lh_view->set_value(array(
					'head_title'	=> 'Register',
					'type'			=> 'oauth',
					'userdata'		=> $userdata,
					'no_profile'	=> '/static/img/avatar.jpg'
				));
				$this->lh_view->set_partial('body', 'modules/signup');
				$this->lh_view->render();
				return;
			}
		} else {
			redirect('/');
		}
	}
	
	public function signup() {
		if ($this->input->post()) {
			// Password
			if (!function_exists('password_hash')) $this->load->helper('password');
			$hash = password_hash(md5(time().rand()), PASSWORD_BCRYPT); // generate random password
			$profile_image = str_replace('/'.$this->config->item('img_path').'/', '', $this->input->post('user-profile'));
			$userdata = array(
				'email'			=> $this->input->post('user-email'),
				'profile' 		=> $profile_image,
				'firstname'		=> $this->input->post('user-fname'),
				'lastname' 		=> $this->input->post('user-lname'),
				'password'		=> $hash,
				'interest'		=> $this->input->post('user-interest'),
				'native'		=> $this->input->post('user-native'),
				'learn'			=> $this->input->post('user-learn')
			);
			
			if ($this->lh_user->add($userdata)) {
				$this->lh_authenticate->signup_login($this->input->post('email'));
				$results = array(
					'result' => true
				);
			} else {
				$results = array(
					'result' => false,
					'message' => 'Failed to registration!'
				);
			}
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($results));
			return;
		} else {
			$this->load->library('lh_oauth');
			$data = array(
				'redirect_uri' => site_url('authenticate/oauth_facebook'),
				'scope' => 'email'
			);
			redirect($this->lh_oauth->getLoginUrl($data));
		}
	}

	public function logout() {
		$this->lh_authenticate->logout();
		redirect('/', 'location');
	}
}

/* End of file authenticate.php */
/* Location: ./application/controllers/authenticate.php */
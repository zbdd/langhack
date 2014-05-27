<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends LH_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->lh_view->set_frame('index');
		$this->lh_view->set_partial('header', 'modules/header');
		$this->lh_view->set_partial('footer', 'modules/footer');
	}
	
	public function index() {
		$users = array();
		foreach($this->User_model->find() as $user) {
            $user->profile = '/static/img/'.$user->profile;
            switch ($user->native) {
            	case 'Korean':	$user->background = 'white'; break;
            	case 'English':	$user->background = 'blue'; break;
            	case 'Chinese':	$user->background = 'red'; break;
            	default:		$user->background = 'white'; break;
            }
            $users[] = $user;
        }
        $this->lh_view->set_value(array(
            'head_title' => 'Search',
            'users' => $users
        ));

		$this->lh_view->set_partial('body', 'search');
		$this->lh_view->render();
	}

	public function load() {
		$users = array();
		foreach($this->User_model->find() as $user) {
			$users[] = $user;
		}

		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($users));
		return;
	}

	public function more($user_id = null) {
		if (!empty($user_id) && $user = $this->User_model->find_one(array('id' => $user_id))) {
			$user->profile = '/static/img/'.$user->profile;
			$this->lh_view->set_value(array(
				'userdata' => $user
			));
			$this->lh_view->set_partial('body', 'more');
		} else {
			$this->lh_view->set_partial('body', 'error');
		}
		$this->lh_view->render();
	}

	public function calendar() {
		$this->lh_view->set_partial('body', 'calendar');
		$this->lh_view->render();
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */

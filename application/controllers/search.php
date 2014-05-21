<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends LH_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->lh_view->set_frame('index');
		$this->lh_view->set_partial('header', 'modules/header');
		$this->lh_view->set_partial('footer', 'modules/footer');
	}
	
	public function index()
	{
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

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */

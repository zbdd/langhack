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
		$this->lh_view->set_partial('body', 'search');
		$this->lh_view->render();
	}

	public function load() {
		// $query = $this->User_model->query("SELECT * FROM Users");
		// json_encode($query);

		$users = array();
		foreach($this->User_model->find() as $user) {
			$users[] = $user;
		}

		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($users));
		return;
	}

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */

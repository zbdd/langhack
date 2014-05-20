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

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */

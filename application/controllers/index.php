<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends LH_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->lh_view->set_frame('index');
		$this->lh_view->set_partial('header', 'modules/header');
		$this->lh_view->set_partial('footer', 'modules/footer');
	}
	
	public function index()
	{
		$this->lh_view->set_partial('body', 'main');
		$this->lh_view->render();
	}
	
	public function about() {
		$this->lh_view->set_value(array(
			'head_title' => 'About'
		));
		$this->lh_view->set_partial('body', 'about');
		$this->lh_view->render();
	}

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */

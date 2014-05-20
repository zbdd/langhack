<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends LH_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->odab_view->set_frame('index');
		// $this->odab_view->set_partial('header', 'modules/header');
		// $this->odab_view->set_partial('tabmenu', 'modules/tabmenu');
		// $this->odab_view->set_partial('footer', 'modules/footer');
	}
	
	public function index()
	{
		// $init = '/questions/exam/'.get_latest_exam().'-국어A';
		// redirect($init, 'location');
		// return;
		// $this->odab_view->set_partial('content', 'home');
		// $this->odab_view->render();
	}
	
	public function about() {
		$this->odab_view->set_value(array(
			'head_title' => '서비스소개'
		));
		$this->odab_view->set_partial('content', 'static/about');
		$this->odab_view->render();
	}
	
	public function terms() {
		$this->odab_view->set_value(array(
			'head_title' => '서비스약관'
		));
		$this->odab_view->set_partial('content', 'static/terms');
		$this->odab_view->render();
	}
	
	public function privacy() {
		$this->odab_view->set_value(array(
			'head_title' => '개인정보취급방침'
		));
		$this->odab_view->set_partial('content', 'static/privacy');
		$this->odab_view->render();
	}
	
	public function policy() {
		$this->odab_view->set_value(array(
			'head_title' => '운영정책'
		));
		$this->odab_view->set_partial('content', 'static/policy');
		$this->odab_view->render();
	}
	
	public function notice() {
		$this->odab_view->set_value(array(
			'head_title' => '공지사항'
		));
		$this->odab_view->set_partial('content', 'static/notice');
		$this->odab_view->render();
	}
	
	public function contact() {
		$this->odab_view->set_value(array(
			'head_title' => '문의'
		));
		$this->odab_view->set_partial('content', 'static/contact');
		$this->odab_view->render();
	}
	
	public function faq() {
		$this->odab_view->set_value(array(
			'head_title' => '도움말'
		));
		$this->odab_view->set_partial('content', 'static/faq');
		$this->odab_view->render();
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */

<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class LH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		/**
		 * enable profiler
		 */
		if($this->input->get('enable_profiler')) {
			$this->output->enable_profiler(true);
		}
		
		// is allowed check
		// if ($this->odab_user->get('id')) {
			
		// } else {
		// 	if($this->input->is_ajax_request()) {
		// 		$this->output->set_content_type('application/json');
		// 		$this->output->set_output(json_encode(array(
		// 			'result' => false,
		// 			'message' => '페이지에 접근할 수 없습니다.'
		// 		)));
		// 	} else {
		// 		if($this->odab_user->get('id') == 1) {
		// 			show_error('현재 페이지에 접근할 수 있는 권한이 없습니다. <a href="/login?return_url=' . urlencode($this->uri->uri_string()) . '">Login</a>', 403, '권한');
		// 		} else {
		// 			show_error('현재 페이지에 접근할 수 있는 권한이 없습니다. <a href="#" onclick="history.back(); return false;">Back</a>', 403, '권한');
		// 		}				
		// 	}
		// }	
	}
}
/* EOF */
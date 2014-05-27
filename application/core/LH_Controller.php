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
			
	}
}
/* EOF */
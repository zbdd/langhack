<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Convert date-time to sns used format
 * @param	mixed	string 
 * @return	mixed	string 
 */
if (!function_exists('sns_time')) {
	function sns_time ($time) {
		$gap = time() - $time;
		if ($gap < 0) {
			$rtime=date('Y/m/d H:i:s',$time); 
		} else if ($gap < 60) {
			$rtime=$gap.'초전';
		} else if ($gap >= 60 && $gap < 3600) {
			$rtime=round($gap/60).'분전'; 
		} else if ($gap >= 3600 && $gap < 86400) {
			$rtime=round($gap/60/60).'시간전'; 
		} else {
			$rtime=date('m월 d일',$time);
		}
		return $rtime;
	}
}

if (!function_exists('format_time')) {
	function format_time ($time) {
		$format = explode(' ', $time);
		$date = str_replace("-", ".", $format[0]);
		if (intval(substr($format[1], 0, 2)) < 12 ) {
			$date .= ' 오전 '.substr($format[1], 0, 5);
		} else {
			$date .= ' 오후 '.(intval(substr($format[1], 0, 2))-12).':'.substr($format[1], 3, 2);
		}
		return $date;
	}
}

if (!function_exists('image_thumb')) {
	function image_thumb( $image_path ) {
	    $CI =& get_instance();
		$CI->load->library('image_lib');
	    // Path to image thumbnail
	    $thumb_file_name = substr($image_path, 0, -4) . '-w' . $CI->config->item('question_thumb_width') . substr($image_path, -4);
		$config['thumb_path'] = $_SERVER['DOCUMENT_ROOT'] . $CI->config->item('thumbnail_path') . '/' . substr($image_path, 0, 6);
		
		if(!is_really_writable($config['thumb_path'])) {
			mkdir($config['thumb_path']);
		}
		
		$thumb_file_path = $CI->config->item('thumbnail_path').'/'.$thumb_file_name;
		
	   	if ( !file_exists( $thumb_file_path ) ) {
	   		//$config['image_library'] 	= 'imagemagick';
	        $config['source_image']     = $_SERVER['DOCUMENT_ROOT'].'/static/img/questions/'.$image_path;
	        $config['new_image']        = $_SERVER['DOCUMENT_ROOT'].$thumb_file_path;
			//list($width, $height, $type, $attr) = getimagesize($config['source_image']);
			//$beautified_height = ($CI->config->item('question_thumb_width') * $height) / $width;
	        $config['maintain_ratio']   = TRUE;
			$config['create_thumb'] 	= TRUE;
			//$config['quality']			= 100;
	        $config['width']            = 350;//$CI->config->item('question_thumb_width');
			$config['height']			= 350;//$beautified_height;
			
			$CI->image_lib->initialize($config);
			if(!$CI->image_lib->resize()) echo $CI->image_lib->display_errors();
	        $CI->image_lib->clear();
	    }
	    //return '<img src="' . dirname( $_SERVER['SCRIPT_NAME'] ) . '/' . $image_thumb . '" />';
	    return $thumb_file_path;
	}
}

if (!function_exists('get_examiner')) {
	function get_examiner($month) {
		$CI =& get_instance();
		$name = $CI->config->item('monthly_exam_name');
		return $name[$month];
	}
}
if (!function_exists('get_exam_copyright')) {
	function get_exam_copyright($month) {
		$CI =& get_instance();
		$copyright = $CI->config->item('examiner_copyright');
		return $copyright[$month];
	}
}
if (!function_exists('get_latest_exam')) {
	function get_latest_exam() {
		$y = 2013;
    // $y = date('Y');
		$CI =& get_instance();
		$CI->load->model('Exam_model');
		$max_month = $CI->Exam_model->columns('MAX(month) as latest')->find_one('year = '.$y);
		if ($max_month) {
			$return = '고3-'.$y.'년-'.$max_month->latest.'월';
		} else {
			$return = '고3-'.(intval($y)-1).'년-11월';
		}
		return $return;
	}
}
if (!function_exists('get_circled_number')) {
	function get_circled_number($input) {
		switch(intval($input)) {
			case 1: return '①';
			case 2: return '②';
			case 3: return '③';
			case 4: return '④';
			case 5: return '⑤';
			default: return $input;
		}
	}
}

if (!function_exists('get_subject_id_for_notes')) {
	function get_subject_id_for_notes() {
		
	}
}

if (!function_exists('get_data_uri')) {
	function get_data_uri($image, $mime = '') {
		return 'data: '.(function_exists('mime_content_type') ? mime_content_type($image) : $mime).';base64,'.base64_encode(file_get_contents($image));
	}
}

/**
 * Make search option of each parameter
 * @return	Array
 */
if (!function_exists('get_search_option')) {
	function get_search_option ($case='year', $subject_name=array()) {
		$options = array();
		switch ($case) {
			case 'grade':
				for ($i=3; $i>0; $i--)
					$options[] = array('val' => $i);
				break;
			case 'year':
				for ($i=date('Y'); $i>=2004; $i--) {
					$options[] = array('val' => $i);
				}
				break;
			case 'month':
				$months = array('11', '10', '9', '7', '6', '4', '3');
				foreach ($months as $month) {
					$options[] = array('val' => $month);
				}
				break;
			case 'subject':
				foreach ($subject_name as $key => $value) {
					foreach ($value['subjects'] as $key_val => $value_val) {
						$options[] = array("id" => $value_val['unique_id'], "val" => $value_val['name']);
					}
				}
				break;
			default:
				break;
		}
		return $options;
	}
}

if(!function_exists('large_array_diff')) {
	function large_array_diff ($a, $b) {
		$map = array();
		foreach($a as $val) $map[$val] = 1;
		foreach($b as $val) if(isset($map[$val])) unset($map[$val]);
		return $map;
	}
}

if(!function_exists('ifempty')) {
	function ifempty(&$value, $alternative = null) {
		if(isset($value) && $value) {
			return $value;
		} else {
			return $alternative;
		}
	}
}

if(!function_exists('array_getter')) {
	function array_getter(&$array, $index) {
		return isset($array[$index]) ? $array[$index] : '';
	}
}

if(!function_exists('split_getter')) {
	function split_getter($string, $delimiter, $index) {
		$splited = explode($delimiter, $string);
		
		return ifempty($splited[$index], '');
	}
}

if(!function_exists('set_error')) {
	// set_error('error', '메세지...');
	// set_error('notice', '메세지...');
	function set_error($type, $message) {
		$CI =& get_instance();
		
		if($type == 'error') $CI->otd->is_error = true;		
		if(!isset($CI->otd->errors)) $CI->otd->errors = array();
		
		$CI->otd->errors[] = array(
			'type' => $type,
			'message' => $message
		);
		
		return $CI->session->set_flashdata('errors', $CI->otd->errors);
	}
}

if(!function_exists('get_error')) {
	function get_error() {
		$CI =& get_instance();
		$errors = $CI->session->flashdata('errors');
		
		return $errors ? $errors : array();
	}
}

if(!function_exists('error_exists')) {
	function error_exists() {
		$CI =& get_instance();
		
		return isset($CI->otd->is_error) && $CI->otd->is_error ? true : false;
	}
}
/* EOF */
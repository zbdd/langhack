<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Global Configurations
| -------------------------------------------------------------------
*/

/* mailing */
$config['help_mail']			= 'help@langhack.me';

/* paths */
$config['static_path']			= '/static/';

/* predefined uri */
$config['predefined'] = array(
	'admin', 'administrator', 'answer', 'answers', 'attachment', 'thumbnail', 'authenticate',
	'index', 'home', 'error', 'login', 'logout', 'signup', 'signin', 'signout', 'register',
	'user', 'users', 'setting', 'option', 'options', 'upload', 'uploader', 'mypage',
	'about', 'terms', 'privacy', 'contact', 'faq', 'notice', 'root', 'email', 'test'
);

/* facebook app */
$config['facebook'] = array(
	'appId' => '192656927575985',
	'secret' => 'caf1e28d710a07f01b99730bd683998f'
);

/* points */
$config['point'] = array(
	'vote_up'		=> 50,
	'vote_down' 	=> 50
);

/* load count */
$config['init_user_count']	= 20;
$config['more_user_count']	= 10;

/* pagination default */
$config['pagination_default'] = array(
	'first_link' => false,
	'prev_link' => '<', // <i class="fa-icon-chevron-left"></i>
	'last_link' => false,
	'next_link' => '>', // <i class="fa-icon-chevron-right"></i>
	'cur_tag_open' => '<li class="active"><a href="#" onclick="return false;">',
	'cur_tag_close' => '</a></li>',
	'num_tag_open' => '<li>',
	'num_tag_close' => '</li>',
	'prev_tag_open' => '<li>',
	'prev_tag_close' => '</li>',
	'next_tag_open' => '<li>',
	'next_tag_close' => '</li>',
	'use_page_numbers' => true,
	'page_query_string' => true,
	'per_page' => 10,
	'num_links' => 4,
	'full_tag_open' => '<div class="pagination"><ul>',
	'full_tag_close' => '</ul></div>'
);

/* EOF */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_template {
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function begining($title = '',$name_content,$name_script,$data_isi = '')
	{
		$isi = array(
			'title' => $title,
			'header' => 'layout/_header',
			'navbar' => 'layout/_navbar',  
			'sidebar' => 'layout/_sidebar',
			'content' => $name_content,
			'footer' => 'layout/_footer',
			'bottom' => 'layout/_bottom',
			'script' => $name_script,
			'data' => $data_isi
		);
		$this->CI->load->view('layout', $isi);
	}

}

/* End of file Load_template.php */
/* Location: ./application/libraries/Load_template.php */
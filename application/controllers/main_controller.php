<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	public function __construct()
  	{
    	parent::__construct();
  	}

  //vista del visitante
  public function index()
	{	
		$data['main_content'] = 'main/index_main_view';
		$this->load->view('main_template', $data);
	}
}
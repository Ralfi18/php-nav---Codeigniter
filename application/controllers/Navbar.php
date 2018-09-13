<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Navbar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('navbar_model');
	}

	public function index()
	{
		$data['pages'] = $this->navbar_model->getPages();
		$this->load->view('home', $data);
	}
}
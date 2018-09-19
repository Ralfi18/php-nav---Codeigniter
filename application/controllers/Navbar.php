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
		// load nav model
		$this->load->model('navbar_model');
		// load navbar lib
		$this->load->library('multy_nav');
	}

	public function index()
	{
		// load getPages method from model
		$data['pages'] = $this->navbar_model->getPages();
		// init the navbar library and pass the model for the pages links
		$this->multy_nav->navInit($data['pages']);
		// navigation output 
		$data['navbar'] = $this->multy_nav->output();
		// load view and pass parms
		$this->load->view('home', $data);
	}
}
<?php 

/**
* 
*/
class Navbar_model extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	public function getPages()
	{
		$query = $this->db->get('nav');
		return $query->result();
	}
}
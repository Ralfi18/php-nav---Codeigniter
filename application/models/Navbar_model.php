<?php 
defined('BASEPATH') OR exit('No direct access allowed!');
/**
* 
*/
class Navbar_model extends CI_Model
{
	public function getPages( $pageID = null )
	{
		if (!$pageID) {
			$query = $this->db->get('nav');
		} else {
			$query = $this->db->get_where('nav', ['parentID' => $pageID]);
		}
		return $query->result();
	}
}
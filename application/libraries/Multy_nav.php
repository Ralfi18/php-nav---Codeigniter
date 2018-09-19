<?php 
/**
 *
 *
 *
 */

defined('BASEPATH') OR exit('No direct access allowed!');

class Multy_nav {

	protected $CI;
	protected $navText = '';

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
		$bal = $this->CI->load->model('navbar_model');
	}

	public function navInit($pages = null)
	{
		if ($pages && is_array($pages)) {
			foreach ($pages as $page) {
				if ($page->level === NULL) {
					$this->navText .= "<li class='menu-level-1' >" . '<a href="' .$page->path. '">' . $page->name . '</a>';
					if ($page->isParent) {
						$this->subLevesCreate($page->ID, $page->level);
					}
					$this->navText .= "</li>";
				}
			}
		}
	}

	public function subLevesCreate($page, $level = 0)
	{
		$newPages = $this->CI->navbar_model->getPages($page);
		$this->navText .= "<ul class='ul-level-".$level."'>";
		foreach ($newPages AS $newPage) {
			$this->navText .= '<li class="li-level-'.$newPage->level.'" >';
			$this->navText .= '<a class="anchor-level-'.$newPage->level.'" href="'.$newPage->path.'">' . $newPage->name .' </a>';
			if ($newPage->isParent) {
				$this->subLevesCreate($newPage->ID, $newPage->level);
			}
			$this->navText .= '</li>';
		}
		$this->navText .= "</ul>";
	}

	public function output()
	{
		return "<nav><ul>" . $this->navText . "</ul></nav>";
	}
}
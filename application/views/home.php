<?php 
	function subPages($page) {
		$CI =& get_instance();
		$CI->load->model('navbar_model');
		$newPages = $CI->navbar_model->getPages($page);
		
		// print_r($newPages);

		foreach ($newPages AS $newPage) {
				echo '<ul><li ><a class="'.$newPage->level.'" href="'.$newPage->path.'">' . $newPage->name;
				if ($newPage->isParent) {
					subPages($newPage->ID);
				}
				echo '</a></li></ul>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Navbar</title>
	<style>
	</style>
</head>
<body>
	<nav>
		<ul>
			<?php 
				foreach ($pages as $page) {
					if ($page->level === NULL) {
						echo "<li class='menu-level-1' >" . '<a href="' .$page->path. '">' . $page->name;
						if ($page->isParent) {
							subPages($page->ID);
						}
						echo "</a></li>";
					}
				}
			?>
		</ul>
	</nav>
</body>
</html>
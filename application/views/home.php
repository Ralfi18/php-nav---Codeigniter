<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Navbar</title>
	<style>
		nav ul {

		}

		ul li {
/*			list-style: none;
			display: inline;*/
		}

		ul li.menu-level-1 {
			
		}
		ul li.menu-level-2 {
			
		}
	</style>
</head>
<body>
	<nav>
		<ul>

			<?php 
				function subPages($page, $i = 1, $prevPage = null) {

					$CI =& get_instance();
					$CI->load->model('navbar_model');
					$newPages = $CI->navbar_model->getPages();
					$index = $i;

					$openTag = '<ul class="ul-'.$index.'">';
					$closingTag = '</ul>';

					echo $openTag;
						foreach($newPages as $newPage ) {
							if( $newPage->parentID == $page->ID ) {
								echo "<li class='menu-level-" . $newPage->level ."' >" . $newPage->name;
								//print_r($newPage) ;
								if ($newPage->isParent) {
									subPages($newPage, $i + 1);
								}
								echo "</li>";
							}
						}
					echo $closingTag;
				}
			?>

			<?php 
				foreach ($pages as $page) {
					if ($page->parentID == null && $page->level == null) {
						echo "<li class='menu-level-1' >" . $page->name;
					}
					
					if($page->isParent) {
						subPages($page);
					}

					echo "</li>";
				}
			?>
		</ul>
	</nav>
</body>
</html>
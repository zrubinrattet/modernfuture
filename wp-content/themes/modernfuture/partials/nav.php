<?php 

require('nav_walker.php');

echo '<nav class="navContainer">';

wp_nav_menu(array(
	'container' => 'div',
	'container_class' => 'nav',
	'menu_class' => 'nav-menu',
	'walker' => new Menu_Walker(),
));

echo '</nav>';

?>
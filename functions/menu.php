<?php
//Add Menu
function menus(){
	register_nav_menu('primary', __('Primary Menu'));
	register_nav_menu('quick-links', __('Quick Links'));
	register_nav_menu('services', __('Services'));
}
add_action('init', 'menus');


<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage healthcare
 */ 
get_header(); 
$healthcare= health_care_get_options();
if (is_front_page())
{	get_template_part('home','slider'); 
	
	if($healthcare['blog_enable'] == "1") {
	get_template_part('home','blog');
	}
	
	get_footer();
}
else 
{	
	if(is_page()){
	get_template_part('page');
	}else{
		get_template_part('index');
	}
}	
?>
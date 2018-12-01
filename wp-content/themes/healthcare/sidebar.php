<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage healthcare
 */
?>
<div class="col-md-3 sidebar">
	<?php if ( is_active_sidebar( 'sidebar-primary' ) )
	{ dynamic_sidebar( 'sidebar-primary' );	}
	else  { 
	$args = array(
	'before_widget' => '<div class="row sidebar-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="line"></div><h4>',
	'after_title'   => '</h4>' );
	the_widget('WP_Widget_Search', null, $args);
	the_widget('WP_Widget_Tag_Cloud', null, $args);
	the_widget('WP_Widget_Recent_Posts', null, $args);
	the_widget('WP_Widget_Categories', null, $args);
	the_widget('WP_Widget_Archives', null, $args);
	} ?>
</div>
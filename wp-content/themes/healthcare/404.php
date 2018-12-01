<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage healthcare
*/
get_header(); ?>
<div class="container-fluid space cover">
	<div class="container">
		<h1 class="white"><?php echo wp_kses_post(get_bloginfo('name')); ?></h1>
		<h4 class="white"><?php esc_attr_e('404 Error','healthcare'); ?></h4>
	</div>
</div>
<div class="container-fluid space">
	<div class="container nopage">
		<h2><?php esc_html_e('404','healthcare'); ?></h2>
		<h4><?php esc_html_e('Whoops... Post Not Found !!!','healthcare'); ?></h4>
		<p><?php esc_html_e('We`re sorry, but the page you are looking for doesn`t exist.','healthcare'); ?></p>
		<p><a href="<?php echo esc_url(home_url( '/' )); ?>"><button class="btn btn-danger" type="submit"><?php esc_html_e('Go To Homepage','healthcare'); ?></button></a></p>
	</div>
</div>
<?php get_footer(); ?>
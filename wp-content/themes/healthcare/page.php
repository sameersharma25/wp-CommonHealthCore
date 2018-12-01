<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage healthcare
*/
get_header(); 
if(empty($_SESSION['userdata'])){
get_template_part('cover');
}
 ?>
<div class="container-fluid space">
	<div class="container blogs">
	<div class="col-md-9 rightside">
		<div <?php post_class();?>>		
			<?php if ( have_posts()): 
			while ( have_posts() ): the_post(); ?>
				<?php get_template_part('post','content'); ?>
			<?php endwhile; 
			else:
				get_template_part('post','nocontent');
			endif; 
			//comments_template( '', true );?>		
			<?php health_care_navigation(); ?>
		</div>
	</div>
	<?php //get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
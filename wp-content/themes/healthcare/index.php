<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage healthcare
 */
get_header();
get_template_part('cover'); ?>
<div class="container-fluid space">
	<div class="container blogs">
		<!-- Post Area -->
		<div class="col-md-9 rightside">
				<?php if ( have_posts()): 
					while ( have_posts() ): the_post(); ?>
					<?php get_template_part('post','content'); ?>
					<?php endwhile;
				else:
					get_template_part('post','nocontent');
				endif; ?>
				<?php health_care_navigation(); ?>
		</div>
	<!-- Sidebar Start -->
	<?php get_sidebar(); ?>
	<!-- Sidebar End -->
	</div>
</div>
<!-- Right End -->
<?php get_footer(); ?>
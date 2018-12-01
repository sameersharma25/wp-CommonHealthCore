<?php 
/**
 * The template for displaying archive pages
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
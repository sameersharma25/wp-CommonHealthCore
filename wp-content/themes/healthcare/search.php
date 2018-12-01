<?php/** * The template for displaying search results pages * * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result * * @package WordPress * @subpackage healthcare*/get_header(); get_template_part('cover'); ?>
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
				endif; ?>
				<?php health_care_navigation(); ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
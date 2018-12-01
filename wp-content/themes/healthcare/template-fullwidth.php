<?php //Template Name:Full Width Page
get_header(); 
get_template_part('cover'); ?>
<div class="container-fluid space">
	<div class="container blogs">
		<div class="col-md-12 rightside">
			<?php if ( have_posts()): 
			while ( have_posts() ): the_post(); ?>
				<?php get_template_part('post','content'); ?>
			<?php endwhile; 
			else:
				get_template_part('post','nocontent');
			endif; 
			comments_template( '', true );?>		
			<?php health_care_navigation(); ?>
		</div>
	</div>
</div>
<!-- Right End -->
<?php get_footer(); ?>
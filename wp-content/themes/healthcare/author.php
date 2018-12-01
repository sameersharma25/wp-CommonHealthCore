<?php get_header(); get_template_part('cover'); ?>
<div class="container-fluid space">
	<div class="container blogs">
		<div class="col-md-9 rightside">
				<?php if ( have_posts()): 
				while ( have_posts() ): the_post();
					get_template_part('post','content'); 
				endwhile; 
				else:
					get_template_part('post','nocontent');
				endif; 		
					health_care_navigation(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
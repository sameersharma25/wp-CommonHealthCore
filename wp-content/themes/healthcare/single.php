<?php 
<div class="container-fluid space">
	<div class="container blogs">
		<div class="col-md-9 rightside">
			<div <?php post_class();?>>	
				<?php if ( have_posts()): 
				while ( have_posts() ): the_post(); ?>
				<?php get_template_part('post','content'); ?>
				<?php health_care_post_link(); 
				endwhile; 
				endif; 
				comments_template( '', true );?>	
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
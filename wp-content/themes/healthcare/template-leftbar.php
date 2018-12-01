<?php //Template Name:Page With Left Sidebar
get_header(); 
get_template_part('cover'); ?>
<div class="container-fluid space">
	<div class="container blogs">
	<?php get_sidebar(); ?>
		<div class="col-md-9 rightside">
			<div <?php post_class();?>>		
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
</div>
<?php get_footer(); ?>
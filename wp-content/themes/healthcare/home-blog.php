<?php $health_data= health_care_get_options(); ?>
<!--  News Start -->
<div class="container-fluid space">
	<div class="container news">
		<h1 class="heading color wow rubberBand"><?php echo esc_attr($health_data['blog_heading']); ?></h1>
		<div class="ln2 color wow rubberBand"></div>
		<span class="fa fa-heart color heart wow rubberBand"></span>
		<div class="ln3 color wow rubberBand"></div>
		<div class="desc wow rubberBand"><?php echo wp_kses_post(get_theme_mod('blog_desc',$health_data['blog_desc'])); ?></div>	<div class="span12">
        <div id="owl-demo" class="owl-carousel gallery wow zoomIn">
		<?php 
		if($health_data['blog_category']) 
		{
			$category = $health_data['blog_category'];
			$args = array( 'post_type' => 'post','post_per_page'=>$health_data['blog_num'] ,'cat' => $category);		
		} else { $args = array( 'post_type' => 'post','post_per_page'=>$health_data['blog_num']); }
		$home_blog= new WP_Query( $args );
		if($home_blog->have_posts()):
		while($home_blog->have_posts()):
		$home_blog->the_post(); ?>
			<div class="item">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="col-md-6 no-pad">
					<?php if(has_post_thumbnail()): 
					$data= array('class' =>'img-responsive home-image');
					the_post_thumbnail('healthcare-post-home', $data); ?>
						<div class="overlay">
								<a rel="prettyPhoto[gallery2]" href="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id() )); ?>"><span class="fa fa-search"></span></a>
								<a href="<?php the_permalink(); ?>"><span class="fa fa-chain"></span></a>
						</div>						<?php endif; ?>
					</div>
					<div class="col-md-6 border">
						<div class="line"></div>
						<a href="<?php the_permalink(); ?>">
						<div class="post_title">
							<h3><?php the_title(); ?></h3>
						</div></a>
						     <div class="post_meta">
							<div class="date"><span class="fa fa-clock-o"> </span>
							   <?php the_date(); ?>  | <span class="fa fa-comment-o"> </span><?php echo comments_number(__('No Comments','healthcare'), __('1 Comment','healthcare'), '% Comments'); ?> 
						        </div>
						     </div>
							 <?php if(get_the_category_list() != '') { ?>
							<div class="category">
								<?php esc_html_e('Categories','healthcare'); ?> : 
								<?php the_category(); ?> 
							</div>
							 <?php } ?>
							<div class="post_content">
							<p><?php echo esc_attr(substr(get_the_excerpt(),0,$health_data['excerpt_blog'] )); ?></p>
							</div>
							<a href="<?php the_permalink(); ?>"><button class="btn" type="button"><?php if($health_data['read_more']) { echo esc_attr($health_data['read_more']); } ?></button></a>
					    </div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
			 <?php endwhile; 
			 endif;?>
		</div>
    </div>
	</div>
</div>
<!-- News End -->
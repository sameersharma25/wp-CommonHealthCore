<!-- Slider Start-->
<?php $healthcare= health_care_get_options(); ?>
    <div id="carousel-example-generic" class="carousel <?php if($healthcare['slider_anim']=="fadeIn") esc_html_e('fadein','healthcare'); else esc_html_e('slide','healthcare');?>" data-ride="carousel">
	 <!-- Indicators -->
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	<?php if($healthcare['slider_image_speed']!='')
	{
		
	echo '<script type="text/javascript">
		jQuery(document ).ready(function( $ ) {
		jQuery("#carousel-example-generic" ).carousel({
			interval:'.esc_attr($healthcare['slider_image_speed']).'

		    });
	   });
	</script>';
	 
	} 
	$dot=0;
	if($healthcare['slider_image1']!='' || $healthcare['slider_image2']!='' || $healthcare['slider_image3']!=''){
	$args = array( 'post_type' => 'post', 'posts_per_page'=>-1, 'post_status'=>'publish','post__in' => array($healthcare['slider_image3'], $healthcare['slider_image2'],$healthcare['slider_image1'] )); 
	$home_slider = new WP_Query( $args );
		if ( $home_slider->have_posts() ):
		while ( $home_slider->have_posts() ):
		$home_slider->the_post();
		if(has_post_thumbnail() ):
		$dot++; ?>
      <div class="item <?php if($dot==1) echo 'active';?>">
	  <?php $data= array('class' =>'img-responsive'); 
		the_post_thumbnail('healthcare-post-thumb', $data); ?>
			<div class="container">
				<div class="carousel-caption wow fadeIn">
				<div class="ln white wow slideInDown"></div>
				<span class="fa fa-heart wow slideInDown"></span>
					<div class="ln1 white wow slideInDown"></div>
					<h1 class="wow zoomInDown" ><?php the_title();?></h1>
					<h3 class="wow zoomInUp"><?php the_excerpt(); ?></h3>
					<a class="btn wow slideInUp" href="<?php the_permalink(); ?>"><?php esc_html_e('Read Post','healthcare'); ?></a>
				</div>
			</div>
      </div> 
	 <?php endif; endwhile;
		endif;
	}
		if($dot==0){
		$dot=2;
	?>
	<div class="item active">
        <img class="img-responsive" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/slider/slider1.jpg" alt="" >
			<div class="container">
				<div class="carousel-caption">
				<div class="ln white"></div>
				<span class="fa fa-heart"></span>
					<div class="ln1 white"></div>
					<h1 class="wow zoomInUp" data-animation="animated bounceInRight">Our Healthcare</h1>
					<p class="wow fadeIn" data-animation="animated bounceInLeft">The Redwood Platform: The Ultimate Healthcare web marketing and management plateform one can sue of our responsibilities. we never compro mise with the diseas of the patient because that can be harmful for him and we can't take risks. </p>
					<button class="btn btn-primary" data-animation="animated zoomInUp" type="button" name="tour">LEARN MORE +</button>
				</div>
			</div>
      </div>

     <!--  <div class="item">
        <img class="img-responsive" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/slider/slider2.jpg" alt="Chania" >
			<div class="container">
				<div class="carousel-caption">
				<div class="ln white"></div>
				<span class="fa fa-heart"></span>
					<div class="ln1 white"></div>
					<h1 class="wow zoomInUp" data-animation="animated bounceInDown">Our Healthcare</h1>
					<p  class="wow zoomInUp" data-animation="animated bounceInLeft">The Redwood Platform: The Ultimate Healthcare web marketing and management plateform one can sue of our responsibilities. we never compro mise with the diseas of the patient because that can be harmful for him and we can't take risks.</p>
					<button class="btn btn-primary" data-animation="animated zoomInUp" type="button" name="tour">LEARN MORE +</button>
				</div>
			</div>
      </div> -->
		<?php } ?>
    </div>
<ol class="carousel-indicators">
<?php for($i=1; $i<=$dot; $i++) { ?>
      <!-- <li  data-target="#carousel-example-generic" data-slide-to="<?php echo esc_attr($i); ?>" <?php echo $i==1 ? 'class="active"' : ""; ?>></li> --><?php } ?>
    </ol>
     <!-- Left and right controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only"><?php esc_html_e('Previous','healthcare'); ?></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only"><?php esc_html_e('Next','healthcare'); ?></span>
    </a>
  </div>
   <!-- Slider End-->
<?php $health_data= health_care_get_options(); ?>
	<!-- Call-out-->
	<?php if($health_data['callout_text']!=''){ ?>
	<div class="container-fluid text">
		<div class="container">
			<div class="col-md-9 col-sm-6 wow slideInLeft">
			<h3><?php echo esc_attr($health_data['callout_text']); ?></h3>
			</div>
			<?php if($health_data['callout_button']!=''){ ?>
			<div class="col-md-3 col-sm-6 wow slideInRight">
			<a href="<?php echo esc_url($health_data['callout_link']); ?>" class="btn link" ><?php echo esc_attr($health_data['callout_button']); ?> <span class="fa fa-plus"></span></a>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<!-- End Call-out -->
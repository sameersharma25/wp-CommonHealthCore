<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<?php $health_data= health_care_get_options(); ?>
<body <?php if($health_data['box_layout']==2) { body_class('boxed'); } else body_class(); ?>>
<!-- Start Header-->
	<div class="container-fluid top">
		<div class="container">
			<div class="col-md-8 col-sm-6 top-phone">
			   <div class="social_details">
				<?php if($health_data['social_phone']!=''){ ?>			
				<i class="fa fa-phone"> </i> <?php echo esc_attr($health_data['social_phone']);  ?><?php } ?>
				<?php if($health_data['social_email']!=''){ ?>  
				<i class="fa fa-envelope"> </i> <a href="mailto:<?php echo esc_url($health_data['social_email']); ?>" ><?php echo esc_attr($health_data['social_email']); ?></a> <?php } ?>
			    </div>
			</div>
			<div class="col-md-4 col-sm-6">
			     <div class="timing_details">
				<?php if($health_data['social_timing']!='') echo 'Opening Hours:'.esc_attr($health_data['social_timing']);?>
			     </div>
			</div>
		</div>
	</div>
	<nav class="navbar  navbar-static-top marginBottom-0 menu" <?php if ( has_header_image() ) { ?> style='background-image: url("<?php header_image(); ?>")' <?php  } ?>>
		<div class="container">
            <div class="navbar-header">
			  <button type="button" class="col-xs-2 navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar black"></span>
				<span class="icon-bar black"></span>
				<span class="icon-bar black"></span>
			  </button>
			   <div class="col-md-12 col-xs-10 logo">
				  <a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="navbar-brand"><?php if($health_data['upload_image_logo']!=''){ ?>
					<img class="img-responsive" src="<?php echo esc_url($health_data['upload_image_logo']); ?>" style="height:<?php if($health_data['logo_height']!='') { echo esc_attr($health_data['logo_height']); }  else { "50"; } ?>px; width:<?php if($health_data['logo_width']!='') { echo esc_attr($health_data['logo_width']); }  else { "250"; } ?>px;" />
				 <?php }else{ ?>
				 <h2><?php echo esc_attr(get_bloginfo('name')); } ?></h2></a>
				 <p> <?php bloginfo( 'description' ); ?> </p>
				</div>
				
			</div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">               
						<?php  wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class' => 'nav navbar-nav navbar-right',
						'fallback_cb' => 'weblizar_fallback_page_menu',
						'walker' => new weblizar_nav_walker(),
						)
						);	 ?>
						 
            </div><!-- /.navbar-collapse -->
		</div>
    </nav> 
<!-- End Header -->
<?php if($_SESSION['userdata']!=''){?>
<script>
	jQuery("#menu-item-65").css("display", "none");
</script>
<?php } else{?>
<script>
	jQuery("#menu-item-74").css("display", "none");
	jQuery("#menu-item-11").css("display", "none");
	jQuery("#menu-item-55").css("display", "none");
	jQuery("#menu-item-13").css("display", "none");
	jQuery("#menu-item-78").css("display", "none");
</script>
	<?php } ?>
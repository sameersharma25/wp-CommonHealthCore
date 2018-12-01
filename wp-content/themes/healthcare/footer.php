<?php 
 /* The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage healthcare
 */
$health_data= health_care_get_options(); ?>
<!-- Start Footer-->
<div class="container-fluid space footer">
	<div class="container">
	<?php if ( is_active_sidebar( 'footer-widget-area' ) ){ dynamic_sidebar('footer-widget-area');
		} else { 
		$footer_default = array(
		'before_widget' => '<div class="col-md-3 col-sm-6 widget-footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="ln white"></div><span class="fa fa-heart white hrt"></span>' );
	
	the_widget('WP_Widget_Categories', null, $footer_default);
	the_widget('WP_Widget_Pages', null, $footer_default);
	the_widget('WP_Widget_Archives', null, $footer_default);
	the_widget('WP_Widget_Calendar', null, $footer_default);	
	} ?>
	</div>
</div>
<div class="container-fluid footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-6">
				<div class="footer_copyright">
					<p><?php echo esc_attr($health_data['footer_copyright']); ?> 
						<a href="<?php echo esc_url($health_data['footer_developed_by_link']); ?>" target="_blank">
							<?php echo esc_attr($health_data['footer_developed_by']); ?>
						</a> 
					</p>
			    </div>
			</div>
			<div class="col-md-3 col-sm-6">
			<?php for($i=1; $i<=8; $i++){
				if($health_data['social_icon_'.$i]!=''){ ?>
				<a href="<?php echo esc_url($health_data['social_link_'.$i]); ?>"><span class="<?php echo esc_attr($health_data['social_icon_'.$i]); ?>"></span></a>
			<?php } } ?>
			</div>
		</div>
	</div>
</div>
<a href="#top" class="scrol enigma_scrollup"><span class="fa fa-angle-up"></span></a>
<!-- End Footer -->
<?php get_template_part('bg', 'css') ;?>
<?php wp_footer(); ?>
</body>
</html>
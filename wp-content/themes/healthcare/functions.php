<?php 
require(dirname(__FILE__).'/customizer.php');
require( get_template_directory() . '/comment-function.php' );
require( get_template_directory() . '/class-tgm-plugin-activation.php' );
//require(get_template_directory().'/admin/admin.php');
require( get_template_directory(). '/menu/default_menu_walker.php' );
require( get_template_directory(). '/menu/weblizar_nav_walker.php' );
require( get_template_directory() . '/custom-header.php');

/*After Theme Setup*/
add_action( 'after_setup_theme', 'health_care_head_setup' );
function health_care_head_setup(){
	if ( ! isset( $content_width ) ) $content_width = 900;
	add_theme_support( 'post-thumbnails' ); //supports featured image
	register_nav_menu( 'primary', __( 'Primary Menu', 'healthcare' ) );
	$args = array(
	'width'         => 1920,
	'height'        => 800,
	'default-text-color'     => 'ffffff',
	'default-image' => '',
	);
	add_editor_style();
	add_theme_support( 'custom-header', $args );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "title-tag" );
	add_theme_support("custom-background");
	add_image_size ('healthcare-post-thumb', 1200, 400,true);
	add_image_size ('healthcare-post-home', 500, 450,true);
	load_theme_textdomain( 'healthcare', get_template_directory() . '/lang' );
	}

/* Health Care widget area */
	add_action( 'widgets_init', 'health_care_widgets_init');
	function health_care_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'healthcare' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'healthcare' ),
			'before_widget' => '<div class="row sidebar-widget">',
			'after_widget' => '</div>',
			'before_title' => '<div class="line"></div><h4 class="widget-title">',
			'after_title' => '</h4>'
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'healthcare' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'healthcare' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 widget-footer">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '<div class="ln white"></div>
				<span class="fa fa-heart white hrt"></span></h3>',
		) );             
	}
	
//Default Options
function health_care_default_settings()
{
	$logo_img= get_template_directory_uri().'/images/Healthcare-logo.png';
	$wl_theme_options=array(
//Ganeral Settings Options
		'upload_image_logo' =>$logo_img,
		'logo_height' =>'50',
		'logo_width' =>'250',
		'excerpt_blog'=>'55',
		'callout_text' => __('Welcome to Health Care','healthcare'),
		'callout_link' => '#',
		'callout_button' => __('Enter','healthcare'),
		'footer_developed_by' => __('Weblizar','healthcare'),
		'footer_developed_by_link' => __('https://weblizar.com/','healthcare'),
		'box_layout'=>'1',
//slider settings
		'slider_image_speed'=>'2000',
		'slider_image1' =>'',
		'slider_image2' =>'',
		'slider_image3' =>'',
//Blog Settings
		'blog_enable' =>1,
		'blog_heading' =>'Latest News',
		'blog_desc' =>'We Provide all services in our hospital. The Services quality is so well known in midleeat countries.',
		'blog_num' =>5,
		'blog_category'=>'',
		'read_more'=>__('Read More', 'healthcare' ),
//Social Settings
		'social_address' =>__('Address','healthcare'),
		'social_phone' =>__('+1234567890','healthcare'),
		'social_email' =>__('admin@site.com','healthcare'),
		'social_timing' =>__('Monday To Saturday - 8am To 9pm','healthcare'),
		'footer_copyright' =>__('Copyright © All Rights Reserved. 2018 | Theme Developed by','healthcare'),
		'footer_copyright_developed_by' =>__('weblizar ','healthcare'),
		'footer_copyright_developed_by_link' =>__('https://weblizar.com/','healthcare'),
		'social_icon_1' =>'fa fa-facebook',
		'social_icon_2' =>'fa fa-twitter',
		'social_icon_3' =>'fa fa-envelope',
		'social_icon_4' =>'fa fa-google-plus',
		'social_icon_5' =>'fa fa-instagram',
		'social_icon_6' =>'fa fa-youtube',
		'social_icon_7' =>'fa fa-vk',
		'social_icon_8' =>'fa fa-qq',
		'social_link_1' =>'#',
		'social_link_2' =>'#',
		'social_link_3' =>'#',
		'social_link_4' =>'#',
		'social_link_5' =>'#',
		'social_link_6' =>'#',
		'social_link_7' =>'#',
		'social_link_8' =>'#',
	
//Font color Settings
		'title_font_color' => '#000000',
		'post_title_font_color' => '#000000',
		'slider_description_font_color' => '#ffffff',
		'theme_color' => '#0098ff',
//Font family Settings		
		'default_font_family' => 'Open Sans',
		);
	return apply_filters( 'health_options', $wl_theme_options );
}
function health_care_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'health_options', array() ), 
        health_care_default_settings() 
    );    
	}

/*Enqueue Styles And JS*/
function health_care_theme_style(){
	//style
	$health_data= health_care_get_options();
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style('bootstrap',get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('animate',get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('prettyPhoto',get_template_directory_uri() . '/css/prettyPhoto.css');
	wp_enqueue_style('healthcare-custom',get_template_directory_uri() . '/css/custom.css');
	wp_enqueue_style('healthcare-mediaResponsive',get_template_directory_uri() . '/css/media-query.css');
	wp_enqueue_style('owl.carousel',get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style('owl.theme',get_template_directory_uri() . '/css/owl.theme.css');
	wp_enqueue_style ('healthcare-googleFonts','https://fonts.googleapis.com/css?family='.$health_data['default_font_family']);
	
	$font_var = '300,400,600,700,900,300italic,400italic,600italic,700italic,900italic';
	$http = (!empty($_SERVER['HTTPS'])) ? "https" : "http";
	
	$default_font_family = str_replace(' ' , '+', $health_data['default_font_family']);
	wp_enqueue_style('googleFonts', $http . '://fonts.googleapis.com/css?family=' . $default_font_family . ':' . $font_var);
		
	//JS
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'masonry');
	wp_enqueue_script('bootstrap_js',get_template_directory_uri().'/bootstrap/js/bootstrap.js');
	wp_enqueue_script('prettyPhotoJs',get_template_directory_uri().'/js/jquery.prettyPhoto.js');
	wp_enqueue_script('healthcare-themeJS',get_template_directory_uri().'/js/theme-scripts.js');
	wp_enqueue_script('owl.carouselJS',get_template_directory_uri().'/js/owl.carousel.js');
	wp_enqueue_script('wow-js',get_template_directory_uri().'/js/wow.js');
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
add_action( 'wp_enqueue_scripts', 'health_care_theme_style' );


if ( ! function_exists( 'health_care_header_style' ) ) :

function health_care_header_style() {
	$header_text_color = get_header_textcolor();

	
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}		

	
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :  ?>
		.logo a {
		color: rgba(241, 241, 241, 0);
		position:absolute;
		clip: rect(1px 1px 1px 1px);
		}
		.navbar-header p {
		color: rgba(241, 241, 241, 0);
		position:absolute;
		clip: rect(1px 1px 1px 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :	?>
		.logo h1, .logo p {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php } endif; 

	
	/****--- Navigation ---***/
	function health_care_navigation() { 
?>
	<div class="row navi">
		<ul class="pager">
			<li class="next"><?php next_posts_link('Older Entries &raquo;') ?></li>
			<li class="previous"><?php previous_posts_link('&laquo; Newer Entries ') ?></li>
		</ul>
	</div>
	<?php }
	
	function health_care_post_link(){ 
	global $post; 
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
		<div class="row navi">
		<ul class="pager">
			<li class="previous"><?php next_post_link( '%link', _x( '%title ', 'Next post link', 'healthcare' ) ); ?></li>
			<li class="next"><?php previous_post_link( '%link', _x( ' %title', 'Previous post link', 'healthcare' ) ); ?></li>
		</ul>
	</div>
	<?php }
	
	
/* Breadcrumbs  */
	function health_care_breadcrumbs() {
    $delimiter = '';
    $home = __('Home', 'healthcare' ); // text for the 'Home' link
    $before = '<li>'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb
    echo '<ul class="breadcrumb">';
    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . esc_attr($homeLink) . '">' . esc_attr($home) . '</a></li>' . esc_attr($delimiter) . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(esc_html(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ')));
        echo wp_kses_post($before) . esc_html_e("Archive by category","healthcare"). single_cat_title('', false). wp_kses_post($after);
    } elseif (is_day()) {
        echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a></li> ' . esc_attr($delimiter) . ' ';
        echo '<li><a href="' . esc_attr(get_month_link(esc_attr(get_the_time('Y')), esc_attr(get_the_time('m')) . '">' . esc_attr(get_the_time('F')))) . '</a></li> ' . esc_attr($delimiter) . ' ';
        echo wp_kses_post($before) . wp_kses_post(get_the_time('d')) . wp_kses_post($after);
    } elseif (is_month()) {
        echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))). '">' . esc_attr(get_the_time('Y')) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
        echo wp_kses_post($before) . wp_kses_post(get_the_time('F')) . wp_kses_post($after);
    } elseif (is_year()) {
        echo wp_kses_post($before) . wp_kses_post(get_the_time('Y')) . wp_kses_post($after);
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li><a href="' . esc_url($homeLink . '/' . $slug['slug']) . '/">' . wp_kses_post($post_type->labels->singular_name) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
            echo wp_kses_post($before) . get_the_title() . wp_kses_post($after);
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo wp_kses_post($before) . get_the_title() . wp_kses_post($after);
        }
		
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo esc_attr($before) . esc_attr($post_type->labels->singular_name) . esc_attr($after);
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo esc_attr(get_category_parents($cat, TRUE, ' ' . $delimiter . ' '));
        echo '<li><a href="' . esc_attr(get_permalink($parent)) . '">' . esc_attr($parent->post_title) . '</a></li> ' . esc_attr($delimiter) . ' ';
        echo esc_attr($before) . esc_attr(get_the_title()) . esc_attr($after);
    } elseif (is_page() && !$post->post_parent) {
        echo wp_kses_post($before) . get_the_title() . wp_kses_post($after);
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo esc_attr($crumb) . ' ' . esc_attr($delimiter) . ' ';
        echo esc_attr($before) . esc_attr(get_the_title()) . esc_attr($after);
    } elseif (is_search()) {
        echo esc_attr($before) . esc_attr("Search results for","healthcare")  . esc_attr(get_search_query()) .esc_attr($after);

    } elseif (is_tag()) {        
		echo esc_attr($before) . esc_attr('Tag','healthcare') . single_tag_title('', false) . esc_attr($after);
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo esc_attr($before) . esc_attr("Articles posted by","healthcare") . esc_attr($userdata->display_name) . esc_attr($after);
    } elseif (is_404()) {
        echo esc_attr($before) . esc_attr("Error 404","healthcare") . esc_attr($after);
    }
    
    echo '</ul>';
	}
	
//Plugin Recommend
add_action('tgmpa_register','health_care_plugin_recommend');
function health_care_plugin_recommend(){
	$plugins = array(
	array(
            'name'      => 'Shortcodes Elements',
            'slug'      => 'shortcodes-elements',
            'required'  => false,
        ),
	array(
            'name'      => 'Admin Custom Login',
            'slug'      => 'admin-custom-login',
            'required'  => false,
        )
		
	);
    tgmpa( $plugins );
}
if (is_admin()) {
	require_once('admin/admin.php');
}

if ( is_admin() && isset($_GET['activated'])  && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'healthcare_activation_notice' );
}

function healthcare_activation_notice(){
	//wp_register_style( 'custom_admin_css', get_template_directory_uri() . '/core/admin/admin-banner.css');
    wp_enqueue_style( 'custom_admin_css' );
	wp_enqueue_style('admin',  get_template_directory_uri() .'/admin/admin-themes.css');
    ?>
    <div class="notice notice-success is-dismissible"> 
		<p><?php echo esc_html__( 'Thanks for installing Healthcare! 
 Please visit our best theme, plugin & offers, make sure you visit our welcome page.', 'healthcare' ); ?></p>
		<p><a class="pro" target="_blank" href="<?php echo admin_url('/themes.php?page=healthcare') ?>"><?php echo esc_html__( 'Visit Welcome Page', 'healthcare' ); ?></a></p>
	</div>
    <?php
}
?>
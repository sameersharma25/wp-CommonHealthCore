<?php      
add_action( 'customize_register', 'healthcare_health_customizer' );
function healthcare_health_customizer( $wp_customize ) {
	wp_enqueue_style('customizr', get_template_directory_uri() .'/css/customizr.css');    
	$health_data= health_care_get_options();
/* Panel */
	$wp_customize->add_panel( 'health_theme_option', array(
    'title' => __( 'Theme Options','healthcare' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
	) );
// General Settings
	$wp_customize->add_section(
        'healthcare_general_option',
        array(
			'title' => 'General Options',
            'description' => 'Here you can customize Your theme',
			'panel'=>'health_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
		));
        $wp_customize->add_setting(
		'health_options[theme_color]',
		array(
			'type'    => 'option',
			'default'=>$health_data['theme_color'],
			'sanitize_callback'=>'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_color',
            array(
                'label'      => 'Theme\'s  Color',
                'section'    => 'healthcare_general_option',
                'settings'   => 'health_options[theme_color]',
            )
        )
        );
	$wp_customize->add_setting(
		'health_options[post_title_font_color]',
		array(
			'type'    => 'option',
			'default'=>$health_data['post_title_font_color'],
			'sanitize_callback'=>'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'post_title_font_color',
            array(
                'label'      => 'Font color for Post Title',
                'section'    => 'healthcare_general_option',
                'settings'   => 'health_options[post_title_font_color]',
            )
        )
	);
	$wp_customize->add_setting(
		'health_options[slider_description_font_color]',
		array(
			'type'    => 'option',
			'default'=>$health_data['slider_description_font_color'],
			'sanitize_callback'=>'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'slider_description_font_color',
            array(
                'label'      => 'Font color for Slider Description',
                'label'      => 'Font color for Slider Description ',
                'section'    => 'healthcare_general_option',
                'settings'   => 'health_options[slider_description_font_color]',
            )
        )
	);
	
	
	$wp_customize->add_setting(
		'health_options[default_font_family]',
		array(
			'type'    => 'option',
			'default'=>$health_data['default_font_family'],
			'sanitize_callback'=>'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( new Healthcare_Font_Control( $wp_customize, 'default_font_family',array(
			'label'    => 'Default Font Family', 
			'section'  => 'healthcare_general_option',
			'settings' => 'health_options[default_font_family]',		
	) ) );
	
	$wp_customize->add_setting('health_options[box_layout]',
        array(
			'type'=>'option',
			'default'=>$health_data['box_layout'],
            'sanitize_callback' => 'health_care_sanitize_integer',
			'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control('box_layout', array(
		'label'=>__( 'Boxed Layout', 'healthcare' ),
        'section' => 'healthcare_general_option',
        'type'    => 'select',
        'choices' => array(
            '1'      => __('Full-Width', 'healthcare'),
            '2'     => __('Boxed', 'healthcare'),
        ),
		'settings'=>'health_options[box_layout]',
    )); 
	
	
	// Header Settings
	$wp_customize->add_section(
        'healthcare_header_option',
        array(
            'title' => 'Header Options',
            'description' => 'Here you can customize Your theme',
	    'panel'=>'health_theme_option',
	     'capability'=>'edit_theme_options',
            'priority' => 35,
	)
	);
	$wp_customize->add_setting(
		'health_options[upload_image_logo]',
		array(
			'type'    => 'option',
			'default'=>$health_data['upload_image_logo'],
			'sanitize_callback'=>'esc_url_raw',
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'health_upload_image_logo', array(
		'label'        => __( 'Website Logo', 'healthcare' ),
		'section'    => 'healthcare_header_option',
		'settings'   => 'health_options[upload_image_logo]',
	) ) );
	$wp_customize->add_setting(
		'health_options[logo_height]',
		array(
			'type'    => 'option',
			'default'=>$health_data['logo_height'],
			'sanitize_callback'=>'health_care_sanitize_integer',
			'capability' => 'edit_theme_options'
		)
	);
	/*$wp_customize->add_control( 'health_logo_height', array(
		'label'        => __( 'Logo Height', 'healthcare' ),
		'type'=>'number',
		'section'    => 'healthcare_header_option',
		'settings'   => 'health_options[logo_height]',
	) );*/
	$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'logo_height', array(
	'type'     => 'range-value',
	'section'  => 'healthcare_header_option',
	'settings' => 'health_options[logo_height]',
	'label'    => __( 'Logo Height','healthcare' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 500,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
	)));
	$wp_customize->add_setting(
		'health_options[logo_width]',
		array(
			'type'    => 'option',
			'default'=>$health_data['logo_width'],
			'sanitize_callback'=>'health_care_sanitize_integer',
			'capability' => 'edit_theme_options'
		)
	);
	/*$wp_customize->add_control( 'health_logo_width', array(
		'label'        => __( 'Logo Width', 'healthcare' ),
		'type'=>'number',
		'section'    => 'healthcare_header_option',
		'settings'   => 'health_options[logo_width]',
	) );*/
	$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'health_logo_width', array(
	'type'     => 'range-value',
	'section'  => 'healthcare_header_option',
	'settings' => 'health_options[logo_width]',
	'label'    => __( 'Logo Width','healthcare' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 500,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
	)));
	$wp_customize->add_setting(
		'health_options[title_font_color]',
		array(
			'type'    => 'option',
			'default'=>$health_data['title_font_color'],
			'sanitize_callback'=>'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'title_font_color',
            array(
                'label'      => 'Font color for Site Title',
                'section'    => 'healthcare_header_option',
                'settings'   => 'health_options[title_font_color]',
            )
        )
	); 
	
	$wp_customize->add_section(
        'healthcare_header_info',
        array(
            'title' => 'Header Info',
            'description' => 'Here you can customize top header',
	    'panel'=>'health_theme_option',
	    'capability'=>'edit_theme_options',
            'priority' => 35,
	)
	);
	
	$wp_customize->add_setting(
		'health_options[social_address]',
		array(
			'type'    => 'option',
			'default'=>$health_data['social_address'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_social_address', array(
		'label'        => __( 'Address','healthcare' ),
		'section'    => 'healthcare_header_info',
		'settings'   => 'health_options[social_address]',
	) );
	$wp_customize->add_setting(
		'health_options[social_phone]',
		array(
			'type'    => 'option',
			'default'=>$health_data['social_phone'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_social_address', array(
		'label'        => __( 'Contact Number','healthcare' ),
		'section'    => 'healthcare_header_info',
		'settings'   => 'health_options[social_phone]',
	) );
	$wp_customize->add_setting(
		'health_options[social_email]',
		array(
			'type'    => 'option',
			'default'=>$health_data['social_email'],
			'sanitize_callback' => 'is_email',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_social_email', array(
		'label'        => __( 'E-Mail','healthcare' ),
		'section'    => 'healthcare_header_info',
		'settings'   => 'health_options[social_email]',
	) );
	$wp_customize->add_setting(
		'health_options[social_timing]',
		array(
			'type'    => 'option',
			'default'=>$health_data['social_timing'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_social_timing', array(
		'label'        => __( 'Working Hours','healthcare' ),
		'section'    => 'healthcare_header_info',
		'settings'   => 'health_options[social_timing]',
	) );
	
	// slider images
	$wp_customize->add_section(
        'healthcare_slider_images',
        array(
            'title' => 'Slider Image Options',
            'description' => 'Here you can customize Your Slider\'s Images',
	    'panel'=>'health_theme_option',
	    'capability'=>'edit_theme_options',
            'priority' => 35,
	)
	);
	
	$wp_customize->add_setting(
		'health_options[slider_image_speed]',
		array(
			'type'    => 'option',
			'default'=>$health_data['slider_image_speed'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_slider_speed', array(
		'label'        => __( 'Slider Speed Option', 'healthcare' ),
		'description' => 'Value will be in milliseconds',
		'type'=>'text',
		'section'    => 'healthcare_slider_images',
		'settings'   => 'health_options[slider_image_speed]',
	) );
	
	$wp_customize->add_setting('health_options[slider_anim]',
		array(
			'type'    => 'option',
			'default'=>'',
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control('slider_anim', array(
		'label'        => __( 'Slider Animation', 'healthcare' ),
		'type'=>'select',
		'section'    => 'healthcare_slider_images',
		'settings'   => 'health_options[slider_anim]',
		'choices'=>array(
			'slide'=>__('Slide','healthcare'),
			'fadeIn'=>__('Fade','healthcare'),
	) ) );
	
	for($i=1; $i<=3; $i++){
	$wp_customize->add_setting(
		'health_options[slider_image'.$i.']',
			array(
			'type'    => 'option',
			'default'=>$health_data['slider_image'.$i],
			'sanitize_callback'=>'health_care_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 
	new Slider_Image_Control( 
	$wp_customize, 'slider_image'.$i,
	array(
		'label'    => 'Slider Image '.$i, 
		'section'  => 'healthcare_slider_images',
		'settings' => 'health_options[slider_image'.$i.']',
			
	) ) );
	
	}
	$wp_customize->add_section(
        'general_section',
        array(
            'title' => __( 'Callout Options','healthcare' ),
            'description' => __('Here you can customize Your theme\'s General Settings','healthcare'),
			'panel'=>'health_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
			
        )
	);
        $wp_customize->add_setting(
		'health_options[callout_text]',
		array(
			'type'    => 'option',
			'default'=>$health_data['callout_text'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_callout_text', array(
		'label'        => __( 'Call-out Text', 'healthcare' ),
		'section'    => 'general_section',
		'settings'   => 'health_options[callout_text]',
	) );
	$wp_customize->add_setting(
		'health_options[callout_link]',
		array(
			'type'    => 'option',
			'default'=>$health_data['callout_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_callout_link', array(
		'label'        => __( 'Call-out Link', 'healthcare' ),
		'section'    => 'general_section',
		'settings'   => 'health_options[callout_link]',
	) );
	$wp_customize->add_setting(
		'health_options[callout_button]',
		array(
			'type'    => 'option',
			'default'=>$health_data['callout_button'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_callout_button', array(
		'label'        => __( 'Call-out Button', 'healthcare' ),
		'section'    => 'general_section',
		'settings'   => 'health_options[callout_button]',
	) );

//Blog Settings
	$wp_customize->add_section(
        'blog_section',
        array(
            'title' => __( 'Theme Blog Options','healthcare' ),
            'description' => __('Here you can customize Your theme\'s Blog Settings','healthcare'),
			'panel'=>'health_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,	
        )
	);
	$wp_customize->add_setting(
		'health_options[blog_enable]',
		array(
			'type'    => 'option',
			'default'=>$health_data['blog_enable'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_Blog_enable', array(
		'label'        => __( 'Show Blog Section on front-page', 'healthcare' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'health_options[blog_enable]',
	) );
	$wp_customize->add_setting(
		'health_options[blog_heading]',
		array(
			'type'    => 'option',
			'default'=>$health_data['blog_heading'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_blog_heading', array(
		'label'        => __( 'Blog Section Title','healthcare' ),
		'section'    => 'blog_section',
		'settings'   => 'health_options[blog_heading]',
	) );
	$wp_customize->add_setting(
		'blog_desc',
		array(
			'default'=>$health_data['blog_desc'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	/*$wp_customize->add_control( 'health_blog_desc', array(
		'label'        => __( 'Add Blog Area Description','healthcare' ),
		'type' =>  'textarea',
		'section'    => 'blog_section',
		'settings'   => 'health_options[blog_desc]',
	) );*/
	
	$wp_customize->add_control(new One_Page_Editor($wp_customize,'blog_desc', array(
		'label'        => __( 'Add Blog Area Description','healthcare' ),
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'section'    => 'blog_section',
		'settings'   => 'blog_desc'
	)));
	
	$wp_customize->add_setting(
		'health_options[blog_num]',
		array(
			'type'    => 'option',
			'default'=>$health_data['blog_num'],
			'sanitize_callback'=>'health_care_sanitize_integer',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_blog_num', array(
		'type'		=>'select',
		'label'        => __( 'Posts To Display','healthcare' ),
		'section'    => 'blog_section',
		'settings'   => 'health_options[blog_num]',
		 'choices'        => array(
                '5'   => 5,
                '7'   => 7,
                '9'   => 9,
				),
	) );
	
	$wp_customize->add_setting('health_options[blog_category]',
		array(
			'type'    => 'option',
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control(new healthcare_category_Control( $wp_customize, 'blog_category', array(
		'label'        => __( 'Blog Category', 'healthcare' ),
		'type'=>'select',
		'section'    => 'blog_section',
		'settings'   => 'health_options[blog_category]',
	) ) );
	
	$wp_customize->add_setting( 'health_options[read_more]', array(
            'type'    => 'option',
            'default'=>$health_data['read_more'],
            'sanitize_callback'=>'health_care_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'read_more', array(
        'label'        => __( 'Blog Read More Button', 'healthcare' ),
        'description' => 'Enter Read More button text',
        'type'=>'text',
        'section'    => 'blog_section',
        'settings'   => 'health_options[read_more]',
    ) );

//Social Settings
	$wp_customize->add_section(
        'social_sction',
        array(
            'title' => __( 'Theme Footer Options','healthcare' ),
            'description' => __('Here you can customize Your theme\'s Social Settings','healthcare'),
			'panel'=>'health_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
        )
	);
	
	$wp_customize->add_setting(
		'health_options[footer_copyright]',
		array(
			'type'    => 'option',
			'default'=>$health_data['footer_copyright'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_footer_copyright', array(
		'label'        => __( 'Footer Copyright Text','healthcare' ),
		'section'    => 'social_sction',
		'settings'   => 'health_options[footer_copyright]',
	) );
	
	$wp_customize->add_setting(
		'health_options[footer_developed_by]',
		array(
			'type'    => 'option',
			'default'=>$health_data['footer_developed_by'],
			'sanitize_callback'=>'health_care_sanitize_text',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'health_footer_developed', array(
		'label'        => __( 'Footer Developed by text','healthcare' ),
		'section'    => 'social_sction',
		'settings'   => 'health_options[footer_developed_by]',
	) );
	
	$wp_customize->add_setting(
			'health_options[footer_developed_by_link]',
			array(
				'type'    => 'option',
				'default'=>$health_data['footer_developed_by_link'],
				'sanitize_callback' => 'esc_url_raw',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'health_footer_developed_link', array(
			'label'        => __( 'Footer developed by link ','healthcare' ),
			'section'    => 'social_sction',
			'settings'   => 'health_options[footer_developed_by_link]',
		) );
	
	
	for($i=1; $i<=8; $i++){
		$wp_customize->add_setting(
			'health_options[social_icon_'.$i.']',
			array(
				'type'    => 'option',
				'default'=>$health_data['social_icon_'.$i],
				'sanitize_callback'=>'health_care_sanitize_text',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'health_social_icon'.$i, array(
			'label'        => __( 'Social Icon ','healthcare' ).$i,
			'section'    => 'social_sction',
			'settings'   => 'health_options[social_icon_'.$i.']',
		) );
		$wp_customize->add_setting(
			'health_options[social_link_'.$i.']',
			array(
				'type'    => 'option',
				'default'=>$health_data['social_link_'.$i],
				'sanitize_callback' => 'esc_url_raw',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( 'health_social_link'.$i, array(
			'label'        => __( 'Social Link ','healthcare' ).$i,
			'section'    => 'social_sction',
			'settings'   => 'health_options[social_link_'.$i.']',
		) );
		
		// excerpt option 
			$wp_customize->add_section('excerpt_option',array(
			'title'=>__("Excerpt Option",'healthcare'),
			'panel'=>'health_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 37,
			));
			
			$wp_customize->add_setting( 'health_options[excerpt_blog]', array(
				'default'=>$health_data['excerpt_blog'],
				'type'=>'option',
				'sanitize_callback'=>'health_care_sanitize_integer',
				'capability'=>'edit_theme_options'
			) );
				$wp_customize->add_control( 'excerpt_blog', array(
				'label'        => __( 'Excerpt length blog section', 'healthcare' ),
				'type'=>'number',
				'section'    => 'excerpt_option',
				'description' => esc_html__('Excerpt length only for home blog section.', 'healthcare'),
				'settings'   => 'health_options[excerpt_blog]'
			) );
	}
}

function health_care_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function health_care_sanitize_checkbox( $input ) {
    return $input;
}
function health_care_sanitize_integer( $input ) {
    return (int)($input);
}
/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Healthcare_Font_Control' ) ) :
class Healthcare_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
  <?php  $google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyC8GQW0seCcIYbo8xt_gXuToPK8xAMx83A';
			//lets fetch it
			$response = wp_remote_retrieve_body( wp_remote_get($google_api_url, array('sslverify' => false )));
			if($response==''){ echo '<script>jQuery(document).ready(function() {alert("Something went wrong! this works only when you are connected to Internet....!!");});</script>'; }
			if( is_wp_error( $response ) ) {
			   echo 'Something went wrong!';
			} else {
			$json_fonts = json_decode($response,  true);
			// that's it
			$items = $json_fonts['items'];
			$i = 0; ?>
   <select <?php $this->link(); ?> >
   <?php foreach( $items as $item) { $i++; $str = $item['family']; ?>
    <option  value="<?php echo esc_attr($str); ?>" <?php if($this->value()== $str) echo 'selected="selected"';?>><?php echo esc_attr($str); ?></option>
   <?php } ?>
    </select>
	<?php 
 }	
 }
}
endif; 

/* class for slider images */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Slider_Image_Control' ) ) :
class Slider_Image_Control extends WP_Customize_Control 
{  
 public function render_content(){ ?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<?php $args = array( 'post_type' => 'post', 'post_status'=>'publish','posts_per_page'=> -1); 
		$slide_id = new WP_Query( $args ); ?>
		<select <?php $this->link(); ?> >
		<option value= ""<?php if($this->value()=='') echo 'selected="selected"';?>><?php esc_html_e('Default Slide','healthcare'); ?></option>
		<?php if($slide_id->have_posts()):
			while($slide_id->have_posts()):
				$slide_id->the_post();
				if(has_post_thumbnail()){ ?>
				 <option value= "<?php echo esc_attr(get_the_id()); ?>"<?php if($this->value()== get_the_id() ) echo 'selected="selected"';?>><?php the_title(); ?></option>
				<?php }
			endwhile; 
	     endif; ?>
		 </select>
		 <?php
}  /* public function ends */
}/*   class ends */
endif; 

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Customizer_Range_Value_Control' ) ) :
class Customizer_Range_Value_Control extends WP_Customize_Control {
	public $type = 'range-value';
	
	 // Enqueue scripts/styles.

	public function enqueue() {
		wp_enqueue_script( 'customizer-range-value-control', get_stylesheet_directory_uri() . '/js/customizer-range-value-control.js', array( 'jquery' ), rand(), true );
		wp_enqueue_style( 'customizer-range-value-control', get_stylesheet_directory_uri() . '/css/customizer-range-value-control.css', array(), rand() );
	}
	
	 
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?>>
				<span class="range-slider__value">0</span></span>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_attr($this->description); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'One_Page_Editor' ) ) :
/* Class to create a custom tags control */
class One_Page_Editor extends WP_Customize_Control {	
	private $include_admin_print_footer = false;
	private $teeny = false;
	public $type = 'text-editor';
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['include_admin_print_footer'] ) ) {
			$this->include_admin_print_footer = $args['include_admin_print_footer'];
		}
		if ( ! empty( $args['teeny'] ) ) {
			$this->teeny = $args['teeny'];
		}
	}
	/* Enqueue scripts */
	public function enqueue() {
		wp_enqueue_script( 'one_lite_text_editor', get_template_directory_uri() . '/inc/customizer-page-editor/js/one-lite-text-editor.js', array( 'jquery' ), false, true );
	}
	/* Render the content on the theme customizer page */
	public function render_content() {
		?>

		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
		<?php
		$settings = array(
			'textarea_name' => $this->id,
			'teeny' => $this->teeny,
		);
		$control_content = $this->value();
		wp_editor( $control_content, $this->id, $settings );

		if ( $this->include_admin_print_footer === true ) {
			do_action( 'admin_print_footer_scripts' );
		}
	}
}
endif;

function show_on_front() {
	if(is_front_page())
	{
		return is_front_page() && 'posts' !== get_option( 'show_on_front' );
	}
	elseif(is_home()) 
	{
		return is_home();
	}
}

/* class for categories */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'healthcare_category_Control' ) ) :
class healthcare_category_Control extends WP_Customize_Control 
{   public function render_content(){ ?>
		<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
		<?php  $healthcare_category = get_categories(); ?>
		<select <?php $this->link(); ?> >
			<?php foreach($healthcare_category as $category){ ?>
				<option value= "<?php echo esc_attr($category->term_id); ?>" <?php if($this->value()=='') echo 'selected="selected"';?> ><?php echo esc_html($category->cat_name); ?></option>
			<?php } ?>
		</select> <?php
	}  /* public function ends */
}/*   class ends */
endif; 
?>

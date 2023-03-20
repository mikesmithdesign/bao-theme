<?php

add_filter('use_block_editor_for_post', '__return_false');
add_theme_support('title-tag');

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Header & Footer',
		'menu_title'	=> 'Header & Footer',
		'menu_slug' 	=> 'header-footer',
		'capability'	=> 'edit_posts',
		'redirect'		=> 'header-settings'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'header-footer',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'header-footer',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact Details',
		'menu_title'	=> 'Contact Details',
		'parent_slug'	=> 'header-footer',
	));
}

function wpdocs_theme_add_editor_styles()
{
	add_editor_style('editor-style.css');
}
add_action('admin_init', 'wpdocs_theme_add_editor_styles');
// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats($init_array)
{
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Featured Text',
			'selector' => 'p',
			'classes' => 'featured',
		)

	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = wp_json_encode($style_formats);

	return $init_array;
}
// Attach callback to 'tiny_mce_before_init' 
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');

function theme_customize_register($wp_customize)
{
	// Site Bg Color
	$wp_customize->add_setting('site_bg_color', array(
		'default'   => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_bg_color', array(
		'section' => 'colors',
		'label'   => esc_html__('Site Background Color', 'theme'),
		'settings' => 'site_bg_color',
	)));

	// Nav Bg Color
	$wp_customize->add_setting('nav_bg_color', array(
		'default'   => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_bg_color', array(
		'section' => 'colors',
		'label'   => esc_html__('Nav Background Color', 'theme'),
		'settings' => 'nav_bg_color',
	)));

	// Nav Text Color
	$wp_customize->add_setting('nav_text_color', array(
		'default'   => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_text_color', array(
		'section' => 'colors',
		'label'   => esc_html__('Nav Text Color', 'theme'),
		'settings' => 'nav_text_color',
	)));

	//Text Color
	$wp_customize->add_setting('text_color', array(
		'default'   => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
		'section' => 'colors',
		'label'   => esc_html__('Text Color', 'theme'),
		'settings' => 'text_color',
	)));

	//Footer Text Color
	$wp_customize->add_setting('footer_text_color', array(
		'default'   => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', array(
		'section' => 'colors',
		'label'   => esc_html__('Footer Text Color', 'theme'),
		'settings' => 'footer_text_color',
	)));
	
	$wp_customize->add_setting('change_tints', array(
		'default'    => '0'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'change_tints',
			array(
				'label'   => esc_html__('Change Tints?', 'theme'),
				'section'   => 'colors',
				'settings'  => 'change_tints',
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_section(
		'fonts',
		array(
			'title'       => __('Fonts', 'theme'),
			'priority'    => 20,
		)
	);

	$wp_customize->add_setting(
		'heading_font',
		array(
			'default'    => '"PT Mono", monospace',
			'type'       => 'theme_mod',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'heading_font',
		array(
			'label'      => __('Select Heading Font', 'theme'),
			'settings'   => 'heading_font',
			'priority'   => 10,
			'section'    => 'fonts',
			'type'    => 'select',
			'choices' => array(
				'"PT Mono", monospace' => 'PT Mono',
				'courier-std, monospace' => 'Courier',
				'"Mindset", sans-serif' => 'Mindset',
			)
		)
	));

	$wp_customize->add_setting(
		'body_font',
		array(
			'default'    => '"PT Mono", monospace',
			'type'       => 'theme_mod',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'body_font',
		array(
			'label'      => __('Select Body Font', 'theme'),
			'settings'   => 'body_font',
			'priority'   => 10,
			'section'    => 'fonts',
			'type'    => 'select',
			'choices' => array(
				'"PT Mono", monospace' => 'PT Mono',
				'courier-std, monospace' => 'Courier',
			)
		)
	));

	$wp_customize->add_setting(
		'mandarin_font',
		array(
			'default'    => 'kozuka-gothic-pr6n, sans-serif',
			'type'       => 'theme_mod',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'mandarin_font',
		array(
			'label'      => __('Select Mandarin Font', 'theme'),
			'settings'   => 'mandarin_font',
			'priority'   => 10,
			'section'    => 'fonts',
			'type'    => 'select',
			'choices' => array(
				'kozuka-gothic-pr6n, sans-serif' => 'Kozuka Gothic Pr6N',
				'source-han-sans-traditional, sans-serif' => 'Source Han Sans Traditional Chinese',
				'ar-weibeib5, sans-serif;f' => 'AR WeiBeiB5Std',
			)
		)
	));


	$wp_customize->add_setting('main_logo');

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'main_logo', array(
		'label' => 'Main Logo',
		'section' => 'title_tagline',
		'settings' => 'main_logo',
	)));



	class WP_Customize_Range_Control extends WP_Customize_Control
	{
		public $type = 'custom_range';
		public function enqueue()
		{
			wp_enqueue_script(
				'cs-range-control',
				get_template_directory_uri() . '/assets/range.js',
				array('jquery'),
				false,
				true
			);
		}
		public function render_content()
		{
?>
<label>
    <?php if (!empty($this->label)) : ?>
    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
    <?php endif; ?>
    <div class="cs-range-value"><?php echo esc_attr($this->value()); ?>px</div>
    <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
    <?php if (!empty($this->description)) : ?>
    <span class="description customize-control-description"><?php echo $this->description; ?></span>
    <?php endif; ?>
</label>
<?php
		}
	}

	$wp_customize->add_setting(
		'main_logo_size',
		array(
			'default'    => '180',
			'type'       => 'theme_mod'
		)
	);

	$wp_customize->add_control(new WP_Customize_Range_Control(
		$wp_customize,
		'main_logo_size',
		array(
			'label'      => __('Main Logo Size', 'theme'),
			'settings'   => 'main_logo_size',
			'section'    => 'title_tagline',
			'input_attrs' => array(
				'min' => 0,
				'max' => 300,
				'step' => 1,
			),
		)
	));


	$wp_customize->add_setting('scroll_logo');

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'scroll_logo', array(
		'label' => 'Scroll Logo',
		'description' => 'Shown after page is scrolled',
		'section' => 'title_tagline',
		'settings' => 'scroll_logo',
	)));


	$wp_customize->add_setting(
		'scroll_logo_size',
		array(
			'default'    => '85',
			'type'       => 'theme_mod'
		)
	);

	$wp_customize->add_control(new WP_Customize_Range_Control(
		$wp_customize,
		'scroll_logo_size',
		array(
			'label'      => __('Scroll Logo Size', 'theme'),
			'settings'   => 'scroll_logo_size',
			'section'    => 'title_tagline',
			'input_attrs' => array(
				'min' => 0,
				'max' => 150,
				'step' => 1,
			),
		)
	));

	$wp_customize->add_setting('footer_logo');

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
		'label' => 'Footer Logo',
		'section' => 'title_tagline',
		'settings' => 'footer_logo',
	)));

	$wp_customize->add_setting(
		'footer_logo_size',
		array(
			'default'    => '60',
			'type'       => 'theme_mod'
		)
	);

	$wp_customize->add_control(new WP_Customize_Range_Control(
		$wp_customize,
		'footer_logo_size',
		array(
			'label'      => __('Footer Logo Size', 'theme'),
			'settings'   => 'footer_logo_size',
			'section'    => 'title_tagline',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
		)
	));
}

add_action('customize_register', 'theme_customize_register');


function scripts()
{
	wp_enqueue_style('app', get_template_directory_uri() . '/assets/styles.css', array(), '0.0.15', false);
	wp_enqueue_script('app', get_template_directory_uri() . '/assets/scripts.js', array(), '0.0.9', true);
}

add_action('wp_enqueue_scripts', 'scripts');

function remove_styles_sections($wp_customize)
{
	$wp_customize->remove_control('blogname');
	$wp_customize->remove_control('site_icon');
	$wp_customize->remove_control('blogdescription');
	$wp_customize->remove_section('static_front_page');
}
add_action('customize_register', 'remove_styles_sections', 20, 1);

require get_template_directory() . '/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://mrbao.co.uk/bao-theme/info.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'bao-theme'
);
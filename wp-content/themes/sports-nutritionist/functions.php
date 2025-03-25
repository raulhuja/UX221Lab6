<?php
/**
 * Sports Nutritionist functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sports_nutritionist
 */

$sports_nutritionist_theme_data = wp_get_theme();
if( ! defined( 'SPORTS_NUTRITIONIST_THEME_VERSION' ) ) define ( 'SPORTS_NUTRITIONIST_THEME_VERSION', $sports_nutritionist_theme_data->get( 'Version' ) );
if( ! defined( 'SPORTS_NUTRITIONIST_THEME_NAME' ) ) define( 'SPORTS_NUTRITIONIST_THEME_NAME', $sports_nutritionist_theme_data->get( 'Name' ) );
if( ! defined( 'SPORTS_NUTRITIONIST_THEME_TEXTDOMAIN' ) ) define( 'SPORTS_NUTRITIONIST_THEME_TEXTDOMAIN', $sports_nutritionist_theme_data->get( 'TextDomain' ) );

if ( ! defined( 'SPORTS_NUTRITIONIST_VERSION' ) ) {
	define( 'SPORTS_NUTRITIONIST_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sports_nutritionist_setup' ) ) :
	
	function sports_nutritionist_setup() {
		
		load_theme_textdomain( 'sports-nutritionist', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'sports-nutritionist' ),
				'social'  => esc_html__( 'Social', 'sports-nutritionist' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio', 
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'sports_nutritionist_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'sports_nutritionist_setup' );

function sports_nutritionist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sports_nutritionist_content_width', 640 );
}
add_action( 'after_setup_theme', 'sports_nutritionist_content_width', 0 );

function sports_nutritionist_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sports-nutritionist' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sports-nutritionist' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	$sports_nutritionist_footer_widget_column = get_theme_mod('sports_nutritionist_footer_widget_column','4');
	for ($i=1; $i<=$sports_nutritionist_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'sports-nutritionist' )  . $i,
			'id' => 'sports-nutritionist-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'sports-nutritionist' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'sports_nutritionist_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sports_nutritionist_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'sports-nutritionist-style', get_template_directory_uri() . '/style.css', array(), SPORTS_NUTRITIONIST_VERSION );

	// RTL style.
	wp_style_add_data('sports-nutritionist-style', 'rtl', 'replace');

	// Navigation script.
	wp_enqueue_script( 'sports-nutritionist-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), SPORTS_NUTRITIONIST_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'sports-nutritionist-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), SPORTS_NUTRITIONIST_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );
}
add_action( 'wp_enqueue_scripts', 'sports_nutritionist_scripts' );

//Change number of products per page 
add_filter( 'loop_shop_per_page', 'sports_nutritionist_products_per_page' );
function sports_nutritionist_products_per_page( $cols ) {
  	return  get_theme_mod( 'sports_nutritionist_products_per_page',9);
}

// Change number or products per row 
add_filter('loop_shop_columns', 'sports_nutritionist_loop_columns');
	if (!function_exists('sports_nutritionist_loop_columns')) {
	function sports_nutritionist_loop_columns() {
		return get_theme_mod( 'sports_nutritionist_products_per_row', 3 );
	}
}

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/theme-library/function-files/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/theme-library/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Customizer Settings Functions
*/
require get_template_directory() . '/theme-library/function-files/customizer-settings-functions.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';

/**
 * Theme Wizard
*/
require get_parent_theme_file_path( '/theme-wizard/config.php' );

// Enqueue Customizer live preview script
function sports_nutritionist_customizer_live_preview() {
    wp_enqueue_script(
        'sports-nutritionist-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array('jquery', 'customize-preview'),
        '',
        true
    );
}
add_action('customize_preview_init', 'sports_nutritionist_customizer_live_preview');

// Featured Image Dimension
function sports_nutritionist_blog_post_featured_image_dimension(){
	if(get_theme_mod('sports_nutritionist_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
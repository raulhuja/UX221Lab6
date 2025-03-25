<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sports_nutritionist
 */


// Output inline CSS based on Customizer setting
function sports_nutritionist_customizer_css() {
    $sports_nutritionist_enable_breadcrumb = get_theme_mod('sports_nutritionist_enable_breadcrumb', true);
    ?>
    <style type="text/css">
        <?php if (!$sports_nutritionist_enable_breadcrumb) : ?>
            nav.woocommerce-breadcrumb {
                display: none;
            }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_customizer_css');

function sports_nutritionist_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#FA9927' ) ); ?>;
            --secondary-color: <?php echo esc_html( get_theme_mod( 'secondary_color', '#94B870' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'sports_nutritionist_customize_css' );


function sports_nutritionist_enqueue_selected_fonts() {
    $sports_nutritionist_fonts_url = sports_nutritionist_get_fonts_url();
    if (!empty($sports_nutritionist_fonts_url)) {
        wp_enqueue_style('sports-nutritionist-google-fonts', $sports_nutritionist_fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'sports_nutritionist_enqueue_selected_fonts');

function sports_nutritionist_layout_customizer_css() {
    $sports_nutritionist_margin = get_theme_mod('sports_nutritionist_layout_width_margin', 50);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($sports_nutritionist_margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_layout_customizer_css');

function sports_nutritionist_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $sports_nutritionist_blog_layout_option = get_theme_mod('sports_nutritionist_blog_layout_option_setting', 'Left');

    // Initialize custom CSS variable
    $sports_nutritionist_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($sports_nutritionist_blog_layout_option === 'Default') {
        $sports_nutritionist_custom_css .= '.mag-post-detail { text-align: center; }';
    } elseif ($sports_nutritionist_blog_layout_option === 'Left') {
        $sports_nutritionist_custom_css .= '.mag-post-detail { text-align: left; }';
    } elseif ($sports_nutritionist_blog_layout_option === 'Right') {
        $sports_nutritionist_custom_css .= '.mag-post-detail { text-align: right; }';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo wp_kses($sports_nutritionist_custom_css, array( 'style' => array(), 'text-align' => array() )); ?>
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_blog_layout_customizer_css');

function sports_nutritionist_sidebar_width_customizer_css() {
    $sports_nutritionist_sidebar_width = get_theme_mod('sports_nutritionist_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($sports_nutritionist_sidebar_width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($sports_nutritionist_sidebar_width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_sidebar_width_customizer_css');

if ( ! function_exists( 'sports_nutritionist_get_page_title' ) ) {
    function sports_nutritionist_get_page_title() {
        $sports_nutritionist_title = '';

        if (is_404()) {
            $sports_nutritionist_title = esc_html__('Page Not Found', 'sports-nutritionist');
        } elseif (is_search()) {
            $sports_nutritionist_title = esc_html__('Search Results for: ', 'sports-nutritionist') . esc_html(get_search_query());
        } elseif (is_home() && !is_front_page()) {
            $sports_nutritionist_title = esc_html__('Blogs', 'sports-nutritionist');
        } elseif (function_exists('is_shop') && is_shop()) {
            $sports_nutritionist_title = esc_html__('Shop', 'sports-nutritionist');
        } elseif (is_page()) {
            $sports_nutritionist_title = get_the_title();
        } elseif (is_single()) {
            $sports_nutritionist_title = get_the_title();
        } elseif (is_archive()) {
            $sports_nutritionist_title = get_the_archive_title();
        } else {
            $sports_nutritionist_title = get_the_archive_title();
        }

        return apply_filters('sports_nutritionist_page_title', $sports_nutritionist_title);
    }
}

if ( ! function_exists( 'sports_nutritionist_has_page_header' ) ) {
    function sports_nutritionist_has_page_header() {
        // Default to true (display header)
        $sports_nutritionist_return = true;

        // Custom conditions for disabling the header
        if ('hide-all-devices' === get_theme_mod('sports_nutritionist_page_header_visibility', 'all-devices')) {
            $sports_nutritionist_return = false;
        }

        // Apply filters and return
        return apply_filters('sports_nutritionist_display_page_header', $sports_nutritionist_return);
    }
}

if ( ! function_exists( 'sports_nutritionist_page_header_style' ) ) {
    function sports_nutritionist_page_header_style() {
        $sports_nutritionist_style = get_theme_mod('sports_nutritionist_page_header_style', 'default');
        return apply_filters('sports_nutritionist_page_header_style', $sports_nutritionist_style);
    }
}

function sports_nutritionist_page_title_customizer_css() {
    $sports_nutritionist_layout_option = get_theme_mod('sports_nutritionist_page_header_layout', 'left');
    ?>
    <style type="text/css">
        .asterthemes-wrapper.page-header-inner {
            <?php if ($sports_nutritionist_layout_option === 'flex') : ?>
                display: flex;
                justify-content: space-between;
                align-items: center;
            <?php else : ?>
                text-align: <?php echo esc_attr($sports_nutritionist_layout_option); ?>;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_page_title_customizer_css');

function sports_nutritionist_pagetitle_height_css() {
    $sports_nutritionist_height = get_theme_mod('sports_nutritionist_pagetitle_height', 50);
    ?>
    <style type="text/css">
        header.page-header {
            padding: <?php echo esc_attr($sports_nutritionist_height); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_pagetitle_height_css');

function sports_nutritionist_site_logo_width() {
    $sports_nutritionist_site_logo_width = get_theme_mod('sports_nutritionist_site_logo_width', 200);
    ?>
    <style type="text/css">
        .site-logo img {
            max-width: <?php echo esc_attr($sports_nutritionist_site_logo_width); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_site_logo_width');

function sports_nutritionist_site_title_styles() {
    $sports_nutritionist_site_title_size = get_theme_mod('sports_nutritionist_site_title_size', 30);
    ?>
    <style type="text/css">
        .site-title a{
            font-size: <?php echo esc_attr($sports_nutritionist_site_title_size); ?>px !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_site_title_styles');

function sports_nutritionist_menu_font_size_css() {
    $sports_nutritionist_menu_font_size = get_theme_mod('sports_nutritionist_menu_font_size', 15);
    ?>
    <style type="text/css">
        .main-navigation a {
            font-size: <?php echo esc_attr($sports_nutritionist_menu_font_size); ?> !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_menu_font_size_css');

// Featured Image Dimension
function sports_nutritionist_custom_featured_image_css() {
    $sports_nutritionist_dimension = get_theme_mod('sports_nutritionist_blog_post_featured_image_dimension', 'default');
    $sports_nutritionist_width = get_theme_mod('sports_nutritionist_blog_post_featured_image_custom_width', '');
    $sports_nutritionist_height = get_theme_mod('sports_nutritionist_blog_post_featured_image_custom_height', '');
    
    if ($sports_nutritionist_dimension === 'custom' && $sports_nutritionist_width && $sports_nutritionist_height) {
        $sports_nutritionist_custom_css = "body:not(.single-post) .mag-post-single .mag-post-img img { width: {$sports_nutritionist_width}px !important; height: {$sports_nutritionist_height}px !important; }";
        wp_add_inline_style('sports-nutritionist-style', $sports_nutritionist_custom_css);
    }
}
add_action('wp_enqueue_scripts', 'sports_nutritionist_custom_featured_image_css');

function sports_nutritionist_sidebar_widget_font_size_css() {
    $sports_nutritionist_sidebar_widget_font_size = get_theme_mod('sports_nutritionist_sidebar_widget_font_size', 24);
    ?>
    <style type="text/css">
        h2.wp-block-heading,aside#secondary .widgettitle,aside#secondary .widget-title {
            font-size: <?php echo esc_attr($sports_nutritionist_sidebar_widget_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_sidebar_widget_font_size_css');

function sports_nutritionist_custom_css() {
    $sports_nutritionist_slider_section = get_theme_mod('sports_nutritionist_enable_banner_section', false);
    if (empty($sports_nutritionist_slider_section)) {
        echo '<style>
            .home header.site-header .header-main-wrapper .bottom-header-outer-wrapper .bottom-header-part {
                position: relative ;
                background: #000000 ;
            }
        </style>';
    }
}
add_action('wp_head', 'sports_nutritionist_custom_css');

function sports_nutritionist_menu_transform_customizer() {
    $sports_nutritionist_menu_text_transform = get_theme_mod( 'sports_nutritionist_menu_text_transform', 'capitalize' );
    
    // If the value isn't the default, add it to the header
    if ( $sports_nutritionist_menu_text_transform && $sports_nutritionist_menu_text_transform !== 'capitalize' ) {
        ?>
        <style type="text/css">
            .main-navigation-links {
                text-transform: <?php echo esc_attr( $sports_nutritionist_menu_text_transform ); ?>;
            }
        </style>
        <?php
    }
}
add_action( 'wp_head', 'sports_nutritionist_menu_transform_customizer' );

// Woocommerce Related Products Settings
function sports_nutritionist_related_product_css() {
    $sports_nutritionist_related_product_show_hide = get_theme_mod('sports_nutritionist_related_product_show_hide', true);

    if ( $sports_nutritionist_related_product_show_hide != true) {
        ?>
        <style type="text/css">
            .related.products {
                display: none;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'sports_nutritionist_related_product_css');

// Woocommerce Product Sale Position 
function sports_nutritionist_product_sale_position_customizer_css() {
    $sports_nutritionist_layout_option = get_theme_mod('sports_nutritionist_product_sale_position', 'left');
    ?>
    <style type="text/css">
        .woocommerce ul.products li.product .onsale {
            <?php if ($sports_nutritionist_layout_option === 'left') : ?>
                right: auto;
                left: 0px;
            <?php else : ?>
                left: auto;
                right: 0px;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'sports_nutritionist_product_sale_position_customizer_css');  

//Copyright Alignment
function sports_nutritionist_footer_copyright_alignment_css() {
    $sports_nutritionist_footer_bottom_align = get_theme_mod( 'sports_nutritionist_footer_bottom_align', 'center' );   
    ?>
    <style type="text/css">
        .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
            justify-content: <?php echo esc_attr( $sports_nutritionist_footer_bottom_align ); ?> 
        }

        /* Mobile Specific */
        @media screen and (max-width: 575px) {
            .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
                justify-content: center;
                text-align:center;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'sports_nutritionist_footer_copyright_alignment_css' );
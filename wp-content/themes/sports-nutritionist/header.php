<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sports_nutritionist
 */
$sports_nutritionist_header_button_label = get_theme_mod( 'sports_nutritionist_header_button_label_', '' );
$sports_nutritionist_header_button_link  = get_theme_mod( 'sports_nutritionist_header_button_link_', '' );

$sports_nutritionist_menu_text_color = get_theme_mod('sports_nutritionist_menu_text_color', ''); 
$sports_nutritionist_sub_menu_text_color = get_theme_mod('sports_nutritionist_sub_menu_text_color', ''); 
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(get_theme_mod('sports_nutritionist_website_layout', false) ? 'site-boxed--layout' : ''); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site asterthemes-site-wrapper">
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sports-nutritionist' ); ?></a>
    <?php if (get_theme_mod('sports_nutritionist_enable_preloader', false)) : ?>
        <div id="loader" class="<?php echo esc_attr(get_theme_mod('sports_nutritionist_preloader_style', 'style1')); ?>">
            <div class="loader-container">
                <div id="preloader">
                    <?php 
                    $sports_nutritionist_preloader_style = get_theme_mod('sports_nutritionist_preloader_style', 'style1');
                    if ($sports_nutritionist_preloader_style === 'style1') : ?>
                        <!-- STYLE 1 -->
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/resource/loader.gif'); ?>" alt="<?php esc_attr_e('Loading...', 'sports-nutritionist'); ?>">
                    <?php elseif ($sports_nutritionist_preloader_style === 'style2') : ?>
                        <!-- STYLE 2 -->
                        <div class="dot"></div>
                    <?php elseif ($sports_nutritionist_preloader_style === 'style3') : ?>
                        <!-- STYLE 3 -->
                        <div class="bars">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<header id="masthead" class="site-header">
    <div class="header-main-wrapper">
        <div class="bottom-header-outer-wrapper <?php echo esc_attr( get_theme_mod( 'sports_nutritionist_enable_sticky_header', false ) ? 'sticky-header' : '' ); ?>">
            <div class="bottom-header-part">
                <div class="asterthemes-wrapper">
                    <div class="bottom-header-part-wrapper hello ">
                        <div class="bottom-header-middle-part">
                            <div class="site-branding">
                                <?php
                                // Check if the 'Enable Site Logo' setting is true.
                                if ( get_theme_mod( 'sports_nutritionist_enable_site_logo', false ) ) {
                                    if ( has_custom_logo() ) { ?>
                                        <div class="site-logo">
                                            <?php the_custom_logo(); ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="site-logo">
                                            <!-- Fallback logo if no custom logo is set -->
                                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                                <img src="<?php echo esc_url(get_template_directory_uri() . '/resource/img/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                                            </a>
                                        </div>
                                    <?php }
                                } ?>
                                <div class="site-identity">
                                        <?php
                                            if ( get_theme_mod( 'sports_nutritionist_enable_site_title_setting', true ) ) {
                                                // Get the site title
                                                $sports_nutritionist_site_title = get_bloginfo('name');
                                                if (empty($sports_nutritionist_site_title)) {
                                                    $sports_nutritionist_site_title = 'Sports Nutritionist'; 
                                                }
                                               
                                                // Explode the title into words and extract the last one
                                                $sports_nutritionist_title_parts = explode(' ', $sports_nutritionist_site_title);
                                                $sports_nutritionist_last_word = array_pop($sports_nutritionist_title_parts);
                                                $sports_nutritionist_title_without_last_word = implode(' ', $sports_nutritionist_title_parts);

                                                if ( is_front_page() && is_home() ) :
                                                    ?>
                                                    <h1 class="site-title">
                                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                            <?php echo esc_html($sports_nutritionist_title_without_last_word) . ' <span class="yellow-text">' . esc_html($sports_nutritionist_last_word) . '</span>'; ?>
                                                        </a>
                                                    </h1>
                                                    <?php
                                                else :
                                                    ?>
                                                    <p class="site-title">
                                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                            <?php echo esc_html($sports_nutritionist_title_without_last_word) . ' <span class="yellow-text">' . esc_html($sports_nutritionist_last_word) . '</span>'; ?>
                                                        </a>
                                                    </p>
                                                    <?php
                                                endif;
                                            }

                                        if ( get_theme_mod( 'sports_nutritionist_enable_tagline_setting', false ) ) :
                                            $sports_nutritionist_description = get_bloginfo( 'description', 'display' );

                                            if ( $sports_nutritionist_description || is_customize_preview() ) :
                                                ?>
                                            <p class="site-description">
                                                <?php
                                                echo esc_html( $sports_nutritionist_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                ?>
                                            </p>
                                                <?php
                                            endif;
                                                ?>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-header-left-part">
                            <div class="navigation-part">
                                <nav id="site-navigation" class="main-navigation">
                                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                    <div class="main-navigation-links">
                                        <?php
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'primary',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <style>
                                        /* Main Menu Links */
                                        .main-navigation ul li a, .menu a {
                                            color: <?php echo esc_attr($sports_nutritionist_menu_text_color); ?>;
                                        }

                                        /* Submenu Links */
                                        .main-navigation ul.children a, 
                                        .home .main-navigation ul.children a, 
                                        .main-navigation ul.menu li .sub-menu a, 
                                        .home .main-navigation ul ul a {
                                            color: <?php echo esc_attr($sports_nutritionist_sub_menu_text_color); ?>;
                                        }
                                    </style>
                                </nav>
                            </div>
                        </div>
                        <div class="bottom-header-right-part">
                            <?php if ( ! empty( $sports_nutritionist_header_button_label ) ) { ?>
                                <div class="header-btn">
                                    <a href="<?php echo esc_url( $sports_nutritionist_header_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $sports_nutritionist_header_button_label ); ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
if ( ! is_front_page() || is_home() ) {
	if ( is_front_page() ) {
		require get_template_directory() . '/sections/sections.php';
		sports_nutritionist_homepage_sections();

	}
	?>
    <?php
        if (!is_front_page() || is_home()) {
            get_template_part('page-header');
        }
    ?>
	<div id="content" class="site-content">
		<div class="asterthemes-wrapper">
			<div class="asterthemes-page">
			<?php } ?>
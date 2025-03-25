<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! sports_nutritionist_has_page_header() ) {
    return;
}

$sports_nutritionist_classes = array( 'page-header' );
$sports_nutritionist_style = sports_nutritionist_page_header_style();

if ( $sports_nutritionist_style ) {
    $sports_nutritionist_classes[] = $sports_nutritionist_style . '-page-header';
}

$sports_nutritionist_visibility = get_theme_mod( 'sports_nutritionist_page_header_visibility', 'all-devices' );

if ( 'hide-all-devices' === $sports_nutritionist_visibility ) {
    // Don't show the header at all
    return;
}

if ( 'hide-tablet' === $sports_nutritionist_visibility ) {
    $sports_nutritionist_classes[] = 'hide-on-tablet';
} elseif ( 'hide-mobile' === $sports_nutritionist_visibility ) {
    $sports_nutritionist_classes[] = 'hide-on-mobile';
} elseif ( 'hide-tablet-mobile' === $sports_nutritionist_visibility ) {
    $sports_nutritionist_classes[] = 'hide-on-tablet-mobile';
}

$sports_nutritionist_PAGE_TITLE_background_color = get_theme_mod('sports_nutritionist_page_title_background_color_setting', '');

// Get the toggle switch value
$sports_nutritionist_background_image_enabled = get_theme_mod('sports_nutritionist_page_header_style', true);

// Add background image to the header if enabled
$sports_nutritionist_background_image = get_theme_mod( 'sports_nutritionist_page_header_background_image', '' );
$sports_nutritionist_background_height = get_theme_mod( 'sports_nutritionist_page_header_image_height', '200' );
$sports_nutritionist_inline_style = '';

if ( $sports_nutritionist_background_image_enabled && ! empty( $sports_nutritionist_background_image ) ) {
    $sports_nutritionist_inline_style .= 'background-image: url(' . esc_url( $sports_nutritionist_background_image ) . '); ';
    $sports_nutritionist_inline_style .= 'height: ' . esc_attr( $sports_nutritionist_background_height ) . 'px; ';
    $sports_nutritionist_inline_style .= 'background-size: cover; ';
    $sports_nutritionist_inline_style .= 'background-position: center center; ';

    // Add the unique class if the background image is set
    $sports_nutritionist_classes[] = 'has-background-image';
}

$sports_nutritionist_classes = implode( ' ', $sports_nutritionist_classes );
$sports_nutritionist_heading = get_theme_mod( 'sports_nutritionist_page_header_heading_tag', 'h1' );
$sports_nutritionist_heading = apply_filters( 'sports_nutritionist_page_header_heading', $sports_nutritionist_heading );

?>

<?php do_action( 'sports_nutritionist_before_page_header' ); ?>

<header class="<?php echo esc_attr( $sports_nutritionist_classes ); ?>" style="<?php echo esc_attr( $sports_nutritionist_inline_style ); ?> background-color: <?php echo esc_attr($sports_nutritionist_PAGE_TITLE_background_color); ?>;">

    <?php do_action( 'sports_nutritionist_before_page_header_inner' ); ?>

    <div class="asterthemes-wrapper page-header-inner">

        <?php if ( sports_nutritionist_has_page_header() ) : ?>

            <<?php echo esc_attr( $sports_nutritionist_heading ); ?> class="page-header-title">
                <?php echo wp_kses_post( sports_nutritionist_get_page_title() ); ?>
            </<?php echo esc_attr( $sports_nutritionist_heading ); ?>>

        <?php endif; ?>

        <?php if ( function_exists( 'sports_nutritionist_breadcrumb' ) ) : ?>
            <?php sports_nutritionist_breadcrumb(); ?>
        <?php endif; ?>

    </div><!-- .page-header-inner -->

    <?php do_action( 'sports_nutritionist_after_page_header_inner' ); ?>

</header><!-- .page-header -->

<?php do_action( 'sports_nutritionist_after_page_header' ); ?>
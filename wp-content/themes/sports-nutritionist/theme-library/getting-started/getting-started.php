<?php
/**
 * Getting Started Page.
 *
 * @package sports_nutritionist
 */


if( ! function_exists( 'sports_nutritionist_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function sports_nutritionist_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'sports-nutritionist' ),
		__( 'Getting Started', 'sports-nutritionist' ),
		'manage_options',
		'sports-nutritionist-getting-started',
		'sports_nutritionist_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'sports_nutritionist_getting_started_menu' );

if( ! function_exists( 'sports_nutritionist_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function sports_nutritionist_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_sports-nutritionist-getting-started' != $hook ) return;

    wp_enqueue_style( 'sports-nutritionist-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, SPORTS_NUTRITIONIST_THEME_VERSION );

    wp_enqueue_script( 'sports-nutritionist-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), SPORTS_NUTRITIONIST_THEME_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'sports_nutritionist_getting_started_admin_scripts' );

if( ! function_exists( 'sports_nutritionist_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function sports_nutritionist_getting_started_page(){ 
	$sports_nutritionist_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'sports-nutritionist' );?> <span class="theme-name"><?php echo esc_html( SPORTS_NUTRITIONIST_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$sports_nutritionist_description = explode( '. ', $sports_nutritionist_theme->get( 'Description' ) );

						$sports_nutritionist_description = implode( '. ', $sports_nutritionist_description );

						echo esc_html( $sports_nutritionist_description . '' );
					?></p>
					<div class="btns-getstart">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'sports-nutritionist' ); ?></a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/sports-nutritionist/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'sports-nutritionist' ); ?>" target="_blank">
							<?php esc_html_e( 'Review', 'sports-nutritionist' ); ?>
						</a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/sports-nutritionist' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'sports-nutritionist' ); ?>" target="_blank">
							<?php esc_html_e( 'Contact Support', 'sports-nutritionist' ); ?>
						</a>
					</div>
					<div class="btns-wizard">
						<a class="wizard" href="<?php echo esc_url( admin_url( 'themes.php?page=sportsnutritionist-wizard' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'One Click Demo Setup', 'sports-nutritionist' ); ?></a>
					</div>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'sports-nutritionist' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'sports-nutritionist' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;
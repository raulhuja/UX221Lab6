<?php

if ( ! get_theme_mod( 'sports_nutritionist_enable_service_section', true ) ) {
	return;
}

$sports_nutritionist_args = '';

sports_nutritionist_render_service_section( $sports_nutritionist_args );

/**
 * Render Service Section.
 */
function sports_nutritionist_render_service_section( $sports_nutritionist_args ) { ?>
	<section id="sports_nutritionist_trending_section" class="asterthemes-frontpage-section trending-section trending-style-1">
		<div class="asterthemes-wrapper">
			<?php
			if ( is_customize_preview() ) :
				sports_nutritionist_section_link( 'sports_nutritionist_service_section' );
			endif;

			$sports_nutritionist_services_short_heading = get_theme_mod( 'sports_nutritionist_services_short_heading', 'About Nutriglow' );
			$sports_nutritionist_services_heading = get_theme_mod( 'sports_nutritionist_services_heading', 'Nourish Your Body, Transform Your Life!' );
			$sports_nutritionist_services_content = get_theme_mod( 'sports_nutritionist_services_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley.' );
			$sports_nutritionist_about_static_number_1 = get_theme_mod( 'sports_nutritionist_about_static_number_1', '1500' );
			$sports_nutritionist_about_static_heading_1 = get_theme_mod( 'sports_nutritionist_about_static_heading_1', 'Happy Customer' );
			$sports_nutritionist_about_static_number_2 = get_theme_mod( 'sports_nutritionist_about_static_number_2', '1500' );
			$sports_nutritionist_about_static_heading_2 = get_theme_mod( 'sports_nutritionist_about_static_heading_2', 'Happy Customer' );
			$sports_nutritionist_about_button_text = get_theme_mod( 'sports_nutritionist_about_button_text', 'Explore' );
			$sports_nutritionist_about_button_url = get_theme_mod( 'sports_nutritionist_about_button_url', '' );
			$sports_nutritionist_about_image_1 = get_theme_mod('sports_nutritionist_about_image_1');
			$sports_nutritionist_about_image_2 = get_theme_mod('sports_nutritionist_about_image_2');
			$sports_nutritionist_about_image_3 = get_theme_mod('sports_nutritionist_about_image_3');
			?>
			<div class="about-main-box">
				<div class="about-left-box">
					<?php if ($sports_nutritionist_about_image_1) { ?>
						<div class="about-image-1">
                        	<img class="right-1" src="<?php echo esc_url( $sports_nutritionist_about_image_1 ); ?>">
                        </div>
                    <?php } else { ?>
                    	<div class="about-image-1">
                        	<img class="right-1" src="<?php echo esc_url( get_template_directory_uri() . '/resource/img/about1.png' ); ?>" >
                        </div>
                    <?php } ?>
                    <div class="image-box">
                    	<?php if ($sports_nutritionist_about_image_2) { ?>
				            <img class="right-1" src="<?php echo esc_url( $sports_nutritionist_about_image_2 ); ?>">
				        <?php } else { ?>
				            <img class="right-1" src="<?php echo esc_url( get_template_directory_uri() . '/resource/img/about2.png' ); ?>">
				        <?php } ?>
				        <?php if ($sports_nutritionist_about_image_3) { ?>
	                        <img class="right-1" src="<?php echo esc_url( $sports_nutritionist_about_image_3 ); ?>">
	                    <?php } else { ?>
	                        <img class="right-1" src="<?php echo esc_url( get_template_directory_uri() . '/resource/img/about3.png' ); ?>" >
	                    <?php } ?>
                    </div>
				</div>
				<div class="about-right-box">
					<?php if ( ! empty( $sports_nutritionist_services_short_heading || $sports_nutritionist_services_heading ) ) { ?>
						<div class="section-heading">
							<h4><?php echo esc_html( $sports_nutritionist_services_short_heading ); ?></h4>
							<h3><?php echo esc_html( $sports_nutritionist_services_heading ); ?></h3>
						</div>
					<?php } ?>
					<?php if ( ! empty( $sports_nutritionist_services_content ) ) { ?>
					<div class="section-content">
						<p><?php echo esc_html( $sports_nutritionist_services_content ); ?></p>
					</div>
					<?php } ?>
					<div class="customer-box">
						<div class="static-box-1">
							<div class="icon-box">
								<span><i class="<?php echo esc_attr(get_theme_mod('sports_nutritionist_about_icon_1','fas fa-apple-alt')); ?>"></i></span>
							</div>
							<?php if ( ! empty( $sports_nutritionist_about_static_number_1 ) ) { ?>
								<h6><?php echo esc_html( $sports_nutritionist_about_static_number_1 ); ?></h6>
							<?php } ?>
							<?php if ( ! empty( $sports_nutritionist_about_static_heading_1 ) ) { ?>
								<h5><?php echo esc_html( $sports_nutritionist_about_static_heading_1 ); ?></h5>
							<?php } ?>
						</div>
						<div class="static-box-2">
							<div class="icon-box">
								<span><i class="<?php echo esc_attr(get_theme_mod('sports_nutritionist_about_icon_2','fas fa-apple-alt')); ?>"></i></span>
							</div>
							<?php if ( ! empty( $sports_nutritionist_about_static_number_2 ) ) { ?>
								<h6><?php echo esc_html( $sports_nutritionist_about_static_number_2 ); ?></h6>
							<?php } ?>
							<?php if ( ! empty( $sports_nutritionist_about_static_heading_2 ) ) { ?>
								<h5><?php echo esc_html( $sports_nutritionist_about_static_heading_2 ); ?></h5>
							<?php } ?>

						</div>
					</div>
					<?php if ( ! empty( $sports_nutritionist_about_button_text ) || ! empty( $sports_nutritionist_about_button_url ) ) { ?>
						<div class="about-btn"><a href="<?php echo esc_url( $sports_nutritionist_about_button_url ); ?>"><?php echo esc_html( $sports_nutritionist_about_button_text ); ?></a></div>
					<?php } ?>
				</div>
			</div>
		</div>	    	
	</section>
	<?php
}
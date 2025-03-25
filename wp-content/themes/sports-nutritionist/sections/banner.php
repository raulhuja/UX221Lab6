<?php
if ( ! get_theme_mod( 'sports_nutritionist_enable_banner_section', false ) ) {
	return;
}

$sports_nutritionist_slider_content_ids  = array();
$sports_nutritionist_slider_content_type = get_theme_mod( 'sports_nutritionist_banner_slider_content_type', 'post' );

for ( $sports_nutritionist_i = 1; $sports_nutritionist_i <= 3; $sports_nutritionist_i++ ) {
	$sports_nutritionist_slider_content_ids[] = get_theme_mod( 'sports_nutritionist_banner_slider_content_' . $sports_nutritionist_slider_content_type . '_' . $sports_nutritionist_i );
}
$sports_nutritionist_banner_slider_args = array(
	'post_type'           => $sports_nutritionist_slider_content_type,
	'post__in'            => array_filter( $sports_nutritionist_slider_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);
$sports_nutritionist_banner_slider_args = apply_filters( 'sports_nutritionist_banner_section_args', $sports_nutritionist_banner_slider_args );

sports_nutritionist_render_banner_section( $sports_nutritionist_banner_slider_args );

/**
 * Render Banner Section.
 */
function sports_nutritionist_render_banner_section( $sports_nutritionist_banner_slider_args ) {     ?>

	<section id="sports_nutritionist_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			sports_nutritionist_section_link( 'sports_nutritionist_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$sports_nutritionist_query = new WP_Query( $sports_nutritionist_banner_slider_args );
			if ( $sports_nutritionist_query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider sports-nutritionist-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php
					$sports_nutritionist_i = 1;
					while ( $sports_nutritionist_query->have_posts() ) :
						$sports_nutritionist_query->the_post();
						$sports_nutritionist_button_label = get_theme_mod( 'sports_nutritionist_banner_button_label_' . $sports_nutritionist_i);
						$sports_nutritionist_button_link  = get_theme_mod( 'sports_nutritionist_banner_button_link_' . $sports_nutritionist_i);
						$sports_nutritionist_button_link  = ! empty( $sports_nutritionist_button_link ) ? $sports_nutritionist_button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-img">
									<?php if ( has_post_thumbnail() ) : ?>
									    <?php the_post_thumbnail( 'full' ); ?>
									<?php else : ?>
									    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/resource/img/default.png" />
									<?php endif; ?>
								</div>
								<div class="banner-caption">
									<div class="asterthemes-wrapper">
										<div class="banner-catption-wrapper">
											<a href="<?php the_permalink(); ?>">
												<h1 class="banner-caption-title">
												    <?php
												    $sports_nutritionist_title = get_the_title();
												    echo esc_html($sports_nutritionist_title) ;
												    ?>
												    
												</h1>
											</a>
											<div class="mag-post-excerpt">
												<?php the_excerpt(); ?>
											</div>
											<?php if ( ! empty( $sports_nutritionist_button_label ) ) { ?>
												<div class="banner-slider-btn">
													<a href="<?php echo esc_url( $sports_nutritionist_button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $sports_nutritionist_button_label ); ?></a>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$sports_nutritionist_i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>
	<?php
}
<?php

/**
 * Template part for displaying Video Format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sports_nutritionist
 */

?>
<?php $sports_nutritionist_readmore = get_theme_mod( 'sports_nutritionist_readmore_button_text','Read More');?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
        <?php
			// Get the post ID
			$sports_nutritionist_post_id = get_the_ID();

			// Check if there are videos embedded in the post content
			$sports_nutritionist_post = get_post($sports_nutritionist_post_id);
			$sports_nutritionist_content = do_shortcode(apply_filters('the_content', $sports_nutritionist_post->post_content));
			$sports_nutritionist_embeds = get_media_embedded_in_content($sports_nutritionist_content);

			if (!empty($sports_nutritionist_embeds)) {
			    // Loop through embedded media and display videos
			    foreach ($sports_nutritionist_embeds as $sports_nutritionist_embed) {
			        // Check if the embed code contains a video tag or specific video providers like YouTube or Vimeo
			        if (strpos($sports_nutritionist_embed, 'video') !== false || strpos($sports_nutritionist_embed, 'youtube') !== false || strpos($sports_nutritionist_embed, 'vimeo') !== false || strpos($sports_nutritionist_embed, 'dailymotion') !== false || strpos($sports_nutritionist_embed, 'vine') !== false || strpos($sports_nutritionist_embed, 'wordPress.tv') !== false || strpos($sports_nutritionist_embed, 'hulu') !== false) {
			            ?>
			            <div class="custom-embedded-video">
			                <div class="video-container">
			                    <?php echo esc_url($sports_nutritionist_embed); ?>
			                </div>
			                <div class="video-comments">
			                    <?php
			                    // Add your comments section here
			                    comments_template(); // This will include the default WordPress comments template
			                    ?>
			                </div>
			            </div>
			            <?php
			        }
			    }
			}
	    ?>
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php sports_nutritionist_categories_list(); ?>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
			else :
				if ( get_theme_mod( 'sports_nutritionist_post_hide_post_heading', true ) ) { 
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			    }
			endif;
			?>
			<div class="mag-post-meta">
				<?php
				sports_nutritionist_posted_by();
				sports_nutritionist_posted_on();
				sports_nutritionist_posted_comments();
				sports_nutritionist_posted_time();
				?>
			</div>
			<?php if ( get_theme_mod( 'sports_nutritionist_post_hide_post_content', true ) ) { ?>
				<div class="mag-post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		    <?php } ?>
			<?php if ( get_theme_mod( 'sports_nutritionist_post_readmore_button', true ) === true ) : ?>
				<div class="mag-post-read-more">
					<a href="<?php the_permalink(); ?>" class="read-more-button">
						<?php if ( ! empty( $sports_nutritionist_readmore ) ) { ?> <?php echo esc_html( $sports_nutritionist_readmore ); ?> <?php } ?>
						<i class="<?php echo esc_attr( get_theme_mod( 'sports_nutritionist_readmore_btn_icon', 'fas fa-chevron-right' ) ); ?>"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
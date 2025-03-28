<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sports_nutritionist
 */

?>
<?php $sports_nutritionist_readmore = get_theme_mod( 'sports_nutritionist_readmore_button_text','Read More');?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
		<div class="mag-post-img">
			<?php sports_nutritionist_post_thumbnail(); ?>
		</div>
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
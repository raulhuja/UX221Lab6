<?php
/**
 * Custom template tags for this theme
 *
 * @package sports_nutritionist
 */

if ( ! function_exists( 'sports_nutritionist_posted_on_single' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time on single posts.
     */
    function sports_nutritionist_posted_on_single() {
        if ( get_theme_mod( 'sports_nutritionist_single_post_hide_date', true ) ) {
            $sports_nutritionist_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $sports_nutritionist_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }
    
            $sports_nutritionist_time_string = sprintf(
                $sports_nutritionist_time_string,
                esc_attr( get_the_date( DATE_W3C ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( DATE_W3C ) ),
                esc_html( get_the_modified_date() )
            );
    
            $sports_nutritionist_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $sports_nutritionist_time_string . '</a></span>';
    
            echo $sports_nutritionist_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }

    }
endif;

if ( ! function_exists( 'sports_nutritionist_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function sports_nutritionist_posted_on() {
        if ( get_theme_mod( 'sports_nutritionist_post_hide_date', true ) ) {
            $sports_nutritionist_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $sports_nutritionist_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }
    
            $sports_nutritionist_time_string = sprintf(
                $sports_nutritionist_time_string,
                esc_attr( get_the_date( DATE_W3C ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( DATE_W3C ) ),
                esc_html( get_the_modified_date() )
            );
    
            $sports_nutritionist_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $sports_nutritionist_time_string . '</a></span>';
    
            echo $sports_nutritionist_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;


if ( ! function_exists( 'sports_nutritionist_posted_by_single' ) ) :
    /**
     * Prints HTML with meta information for the current author on single posts.
     */
    function sports_nutritionist_posted_by_single() {
        if ( get_theme_mod( 'sports_nutritionist_single_post_hide_author', true ) ) {
            $sports_nutritionist_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

            echo '<span class="post-author"> ' . $sports_nutritionist_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'sports_nutritionist_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function sports_nutritionist_posted_by() {
        if ( get_theme_mod( 'sports_nutritionist_post_hide_author', true ) ) {
            $sports_nutritionist_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

            echo '<span class="post-author"> ' . $sports_nutritionist_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'sports_nutritionist_posted_comments_single' ) ) :
    /**
     * Prints HTML with meta information for the current comment count on single posts.
     */
    function sports_nutritionist_posted_comments_single() {
        if ( get_theme_mod( 'sports_nutritionist_single_post_hide_comments', true ) ) {
            $sports_nutritionist_comment_count = get_comments_number();
            $sports_nutritionist_comment_text  = sprintf(
                /* translators: %s: comment count */
                _n( '%s Comment', '%s Comments', $sports_nutritionist_comment_count, 'sports-nutritionist' ),
                number_format_i18n( $sports_nutritionist_comment_count )
            );

            echo '<span class="post-comments"><i class="fas fa-comments"></i> ' . esc_html( $sports_nutritionist_comment_text ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'sports_nutritionist_posted_comments' ) ) :
    /**
     * Prints HTML with meta information for the current comment count.
     */
    function sports_nutritionist_posted_comments() {
        if ( get_theme_mod( 'sports_nutritionist_post_hide_comments', true ) ) {
            $sports_nutritionist_comment_count = get_comments_number();
            $sports_nutritionist_comment_text  = sprintf(
                /* translators: %s: comment count */
                _n( '%s Comment', '%s Comments', $sports_nutritionist_comment_count, 'sports-nutritionist' ),
                number_format_i18n( $sports_nutritionist_comment_count )
            );

            echo '<span class="post-comments"><i class="fas fa-comments"></i> ' . esc_html( $sports_nutritionist_comment_text ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'sports_nutritionist_posted_time_single' ) ) :
    /**
     * Prints HTML with meta information for the current post time on single posts.
     */
    function sports_nutritionist_posted_time_single() {
        if ( get_theme_mod( 'sports_nutritionist_single_post_hide_time', true ) ) {
            $sports_nutritionist_posted_on = sprintf(
                /* translators: %s: post time */
                esc_html__( 'Posted at %s', 'sports-nutritionist' ),
                '<a href="' . esc_url( get_permalink() ) . '"><time datetime="' . esc_attr( get_the_time( 'c' ) ) . '">' . esc_html( get_the_time() ) . '</time></a>'
            );

            echo '<span class="post-time"><i class="fas fa-clock"></i> ' . $sports_nutritionist_posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'sports_nutritionist_posted_time' ) ) :
    /**
     * Prints HTML with meta information for the current post time.
     */
    function sports_nutritionist_posted_time() {
        if ( get_theme_mod( 'sports_nutritionist_post_hide_time', true ) ) {
            $sports_nutritionist_posted_on = sprintf(
                /* translators: %s: post time */
                esc_html__( 'Posted at %s', 'sports-nutritionist' ),
                '<a href="' . esc_url( get_permalink() ) . '"><time datetime="' . esc_attr( get_the_time( 'c' ) ) . '">' . esc_html( get_the_time() ) . '</time></a>'
            );

            echo '<span class="post-time"><i class="fas fa-clock"></i> ' . $sports_nutritionist_posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'sports_nutritionist_categories_single_list' ) ) :
    function sports_nutritionist_categories_single_list( $with_background = false ) {
        if ( is_singular( 'post' ) ) {
            $sports_nutritionist_hide_category = get_theme_mod( 'sports_nutritionist_single_post_hide_category', true );

            if ( $sports_nutritionist_hide_category ) {
                $sports_nutritionist_categories = get_the_category();
                $sports_nutritionist_separator  = '';
                $sports_nutritionist_output     = '';
                if ( ! empty( $sports_nutritionist_categories ) ) {
                    foreach ( $sports_nutritionist_categories as $sports_nutritionist_category ) {
                        $sports_nutritionist_output .= '<a href="' . esc_url( get_category_link( $sports_nutritionist_category->term_id ) ) . '">' . esc_html( $sports_nutritionist_category->name ) . '</a>' . $sports_nutritionist_separator;
                    }
                    echo trim( $sports_nutritionist_output, $sports_nutritionist_separator );
                }
            }
        }
    }
endif;

if ( ! function_exists( 'sports_nutritionist_categories_list' ) ) :
    function sports_nutritionist_categories_list( $with_background = false ) {
        $sports_nutritionist_hide_category = get_theme_mod( 'sports_nutritionist_post_hide_category', true );

        if ( $sports_nutritionist_hide_category ) {
            $sports_nutritionist_categories = get_the_category();
            $sports_nutritionist_separator  = '';
            $sports_nutritionist_output     = '';
            if ( ! empty( $sports_nutritionist_categories ) ) {
                foreach ( $sports_nutritionist_categories as $sports_nutritionist_category ) {
                    $sports_nutritionist_output .= '<a href="' . esc_url( get_category_link( $sports_nutritionist_category->term_id ) ) . '">' . esc_html( $sports_nutritionist_category->name ) . '</a>' . $sports_nutritionist_separator;
                }
                echo trim( $sports_nutritionist_output, $sports_nutritionist_separator );
            }
        }
    }
endif;

if ( ! function_exists( 'sports_nutritionist_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function sports_nutritionist_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_singular() ) {
			$sports_nutritionist_hide_tag = get_theme_mod( 'sports_nutritionist_post_hide_tags', true );

			if ( $sports_nutritionist_hide_tag ) {
				/* translators: used between list items, there is a space after the comma */
				$sports_nutritionist_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'sports-nutritionist' ) );
				if ( $sports_nutritionist_tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'sports-nutritionist' ) . '</span>', $sports_nutritionist_tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'sports-nutritionist' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'sports_nutritionist_post_thumbnail' ) ) :
    /**
     * Display the post thumbnail.
     */
    function sports_nutritionist_post_thumbnail() {
        // Return early if the post is password protected, an attachment, or does not have a post thumbnail.
        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Display post thumbnail for singular views.
        if ( is_singular() ) :
            // Check theme setting to hide the featured image in single posts.
            if ( get_theme_mod( 'sports_nutritionist_single_post_hide_feature_image', false ) ) {
                return;
            }
            ?>
            <div class="post-thumbnail">
                <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(); 
                } else {
                    // URL of the default image
                    $sports_nutritionist_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $sports_nutritionist_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </div><!-- .post-thumbnail -->
        <?php else :
            // Check theme setting to hide the featured image in non-singular posts.
            if ( !get_theme_mod( 'sports_nutritionist_post_hide_feature_image', true ) ) {
                return;
            }
            ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(
                        'post-thumbnail',
                        array(
                            'alt' => the_title_attribute(
                                array(
                                    'echo' => false,
                                )
                            ),
                        )
                    );
                } else {
                    // URL of the default image
                    $sports_nutritionist_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $sports_nutritionist_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </a>
        <?php endif; // End is_singular().
    }
endif;


if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
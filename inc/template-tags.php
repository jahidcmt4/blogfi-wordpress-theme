<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blogfi
 */

if ( ! function_exists( 'blogfi_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function blogfi_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

      $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_html( get_the_modified_date() )
      );

      $icon = '<i class="fas fa-calendar"></i>';

      $posted_on = sprintf(
        '<a class="post-date-text" href="%s" rel="bookmark">%s%s</a>',
        esc_url( get_permalink() ),
        $icon,
        $time_string
      );

      echo  $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'blogfi_posted_by' ) ):
    /**
     * return HTML with meta information for the current author.
     */
    function blogfi_posted_by() {

        $icon = '<i class="fas fa-user-alt"></i>';
        $author_id = get_post_field('post_author', get_the_ID());
        $author_name = get_the_author_meta('display_name', $author_id);
        $url = get_author_posts_url($author_id);
        $byline = sprintf(
            '<a class="post-author-text author vcard" href="%s">%s%s</a>',
            esc_url( $url ),
            $icon,
            esc_html( $author_name )
        );

        echo $byline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;
/**
 * Function for get comment number
 */
if (!function_exists('blogfi_comment_by')):

    function blogfi_comment_by($style = '', $link = true) {
        $number = get_comments_number(get_the_ID());

        if( 0 == $number ){
            $comment_number = sprintf('<a class="post-comment-text comments-number" href="%1$s"><i class="fas fa-comment"></i>%2$s</a>', get_comments_link(), esc_html__('No Comment', 'blogfi'));
        }elseif( 1 == $number ){

            $comment_number = sprintf('<a class="post-comment-text comments-number" href="%1$s"><i class="fas fa-comment"></i>%2$s</a>', get_comments_link(), esc_html__('1 Comment', 'blogfi'));
        }else{
            $comment_number = sprintf('<a class="post-comment-text comments-number" href="%1$s"><i class="fas fa-comment"></i>%2$s</a>', get_comments_link(), $number. esc_html__(' Comments', 'blogfi' ));
        }

        echo $comment_number; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'blogfi_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function blogfi_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'blogfi' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'blogfi' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'blogfi' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'blogfi' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

	}
endif;

if ( ! function_exists( 'blogfi_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function blogfi_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
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
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

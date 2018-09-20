<?php
/**
 * Custom template tags for this theme.
 *
 * @package poly
 */

if ( ! function_exists( 'poly_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function poly_content_nav( $nav_id ) {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'poly' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"></span> Older posts', 'poly' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"></span>', 'poly' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'poly_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function poly_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'poly' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav"></span>&nbsp;%title', 'Previous post link', 'poly' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav"></span>', 'Next post link',     'poly' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'poly_comment' ) ) :
/**
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function poly_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'poly' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'poly' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<header class="comment-meta">
				<?php printf( __( '%s <span class="says">says:</span>', 'poly' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'poly' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'poly' ); ?></p>
				<?php endif; ?>

				<div class="comment-tools">
					<?php edit_comment_link( __( 'Edit', 'poly' ), '<span class="edit-link">', '</span>' ); ?>

					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">',
							'after'     => '</span>',
						) ) );
					?>
				</div><!-- .comment-tools -->
			</header><!-- .comment-meta -->

			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div><!-- .comment-author -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for poly_comment()

if ( ! function_exists( 'poly_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function poly_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'poly_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	if ( $post->post_parent ) {
		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the
		 * URL of the next adjacent image in a gallery, or the first image (if
		 * we're looking at the last image in a gallery), or, in a gallery of one,
		 * just the link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => 999,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID'
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $idx => $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = $attachment_ids[ ( $idx + 1 ) % count( $attachment_ids ) ];
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );

			// or get the URL of the first image attachment.
			} else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'poly_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 */
function poly_entry_meta() {
	// Sticky
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Featured', 'poly' ) . '</span>';
	}

	// Date
	if ( ! is_sticky() ) {
		poly_entry_date();
	}

	// Comments
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'poly' ), __( '1 Comment', 'poly' ), __( '% Comments', 'poly' ) );
		echo '</span>';
	}

	// Edit link
	edit_post_link( __( 'Edit', 'poly' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'poly_entry_date' ) ) :
/**
 * Returns HTML with time information for current post
 */
function poly_entry_date() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'poly' ), the_title_attribute( 'echo=0' ) ) ),
		$time_string
	);
}
endif;

/**
 * Return the first link found in the post content or fall back to permalink.
 */
if ( ! function_exists( 'poly_get_link_url' ) ) :
function poly_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif; // poly_get_link_url

/**
 * Returns true if a blog has more than 1 category
 */
function poly_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'poly_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'poly_category_count', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so poly_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so poly_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in poly_categorized_blog
 */
function poly_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'poly_category_count' );
}
add_action( 'edit_category', 'poly_category_transient_flusher' );
add_action( 'save_post',     'poly_category_transient_flusher' );

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 */
function poly_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>

	<?php else : ?>

	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
		 <?php the_post_thumbnail(); ?>
		</a>
	</div>

	<?php endif; // End is_singular()
}

if ( ! function_exists( 'poly_footer_entry_meta' ) ) :
/**
 * Display category/tag/permalink when applicable
 */
function poly_footer_entry_meta() {
	/* translators: used between list items, there is a space after the comma */
	$category_list = get_the_category_list( __( ', ', 'poly' ) );

	/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list( '', ', ' );

	if ( ! poly_categorized_blog() ) {
		// This blog only has 1 category so we just need to worry about tags in the meta text
		if ( '' != $tag_list && ! is_wp_error( $tag_list ) ) {
			$meta_text = '<span class="tags-links">' . esc_html__( 'Tagged: %2$s', 'poly' ) . '</span>';
		} else {
			$meta_text = __( '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>.', 'poly' );
		}

	} else {
		// But this blog has loads of categories so we should probably display them here
		if ( '' != $tag_list && ! is_wp_error( $tag_list ) ) {
			$meta_text = '<span class="cat-links">' . esc_html__( 'Posted in: %1$s', 'poly' ) . '</span><span class="sep"> | </span><span class="tags-links">' . esc_html__( 'Tagged: %2$s', 'poly' ) . '</span>';
		} else {
			$meta_text = '<span class="cat-links">' . esc_html__( 'Posted in: %1$s', 'poly' ) . '</span>';
		}

	} // end check for categories on this blog

	// If $tag_list contains WP Error, empty before passing to printf()
	if ( is_wp_error( $tag_list ) ) {
		$tag_list = '';
	}

	printf(
		$meta_text,
		$category_list,
		$tag_list,
		esc_url( get_permalink() ),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/**
 * Add custom header image to header area
 */
function poly_header_background() {
	if ( get_header_image() ) {
		$css = '.site-branding { background-image: url(' . esc_url( get_header_image() ) . '); }';
		wp_add_inline_style( 'poly-style', $css );
	}
}
add_action( 'wp_enqueue_scripts', 'poly_header_background', 11 );

function poly_jp_testimonials_content() {
	$jetpack_options = get_theme_mod( 'jetpack_testimonials' );

	if ( isset( $jetpack_options['page-content'] ) && '' != $jetpack_options['page-content'] ) :
	?>

	<div class="entry-content">
		<?php echo convert_chars( convert_smilies( wptexturize( wp_kses_post( $jetpack_options['page-content'] ) ) ) ); ?>
	</div><!-- .entry-content -->

	<?php endif;
}

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'poly' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'poly' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'poly' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'poly' ), get_the_date( _x( 'Y', 'yearly archives date format', 'poly' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'poly' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'poly' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'poly' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'poly' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'poly' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'poly' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'poly' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'poly' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'poly' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'poly' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'poly' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'poly' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'poly' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'poly' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'poly' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'poly' );
	}
	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );
	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );
	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;
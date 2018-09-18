<?php
/**
 * @package Sela
 */
?>

<article id="post-<?php the_ID(); ?>" class="site-main">

	

	<header class="site-main">
		<?php if ( is_single() ) : ?>
			<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );?>
				<div class="header-container-overlay">
					<img class="header-overlay" src="<?php echo esc_url( $large_image_url[0] )?>">'
					<?php the_title( '<h1 class="header center-overlay">', '</h1>' ); ?>
				</div>
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<div class="row-single">
				<div class="col-sm single text-justify">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sela' ) ); ?>
<!-- .entry-content -->
		<?php endif; ?>

		<?php if ( is_single() && 'post' == get_post_type() ) : ?>
		<?php endif; ?>

		<?php sela_author_bio(); ?>
				</div>
	</div>
		</div><
	</div><!-- .entry-body -->

</article><!-- #post-## -->

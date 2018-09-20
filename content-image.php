<?php
/**
 * @package poly
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php poly_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->

	<div class="entry-body">

		<div class="entry-meta">
			<?php poly_entry_meta(); ?>
		</div><!-- .entry-meta -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'poly' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'poly' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if ( is_single() ) : ?>
		<footer class="entry-meta">
			<?php poly_footer_entry_meta(); ?>
		</footer><!-- .entry-meta -->
		<?php endif; ?>

		<?php poly_author_bio(); ?>
	</div><!-- .entry-body -->

</article><!-- #post-## -->
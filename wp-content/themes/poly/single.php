<?php
/**
 * The Template for displaying all single posts.
 *
 * @package poly
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if( 'jetpack-testimonial' === get_post_type() ): ?>

					<?php get_template_part( 'template-parts/content', 'testimonial' ); ?>

					<?php poly_post_nav(); ?>

				<?php else: ?>
					<!-- Get content template-->
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

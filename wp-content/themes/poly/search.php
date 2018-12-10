<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package poly
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="container">
					<div class="row">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'poly' ), '<span>' . get_search_query() . '</span>' ); ?></h1>						
					</div>
				</div>

			</header><!-- .page-header -->

			<!--Get Search Query-->
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'search' ); ?>

			<?php endwhile; ?>

			<?php poly_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

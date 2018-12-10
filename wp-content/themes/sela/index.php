<?php
/**
 * The main template file.
 *
 * @package Sela
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

<<<<<<< HEAD
				<?php get_template_part( 'content', get_post_format() ); ?>
=======
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
>>>>>>> f792b1db3e81be981060d86ce16a792bba17284b

			<?php endwhile; ?>

			<?php sela_content_nav( 'nav-below' ); ?>

		<?php else : ?>

<<<<<<< HEAD
			<?php get_template_part( 'content', 'none' ); ?>
=======
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
>>>>>>> f792b1db3e81be981060d86ce16a792bba17284b

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
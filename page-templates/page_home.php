<?php
/**
 * Template Name: Home Page
 *
 * @package Sela
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<div class="content-wrapper full-width <?php echo sela_additional_class(); ?>">
		<div id="primary" class="content-area grid-page-content-area ">
			<div id="main" class="site-content" role="main">

<?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
<?php endwhile; /* End loop */ ?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->

<?php get_footer(); ?>

<?php
/**
 * Template Name: Home Page
 *
 * @package poly
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

<?php while (have_posts()) : the_post();/* Start loop */ ?>
<div class="container">
        <?php the_content(); ?>
<?php endwhile; /* End loop */ ?>
</div>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->

<?php get_footer(); ?>

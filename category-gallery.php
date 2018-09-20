<?php
/**
 * The template for displaying Archive pages.
 *
<<<<<<< HEAD
 * @package poly
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
					<h1 class="text-center font-weight-bold"><?php single_cat_title(); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

    			<div class="row content justify-content-md-center">
        			<div class="col-md-8 justify-content-md-center">
        				<?php $content = apply_filters( 'the_content', $post->post_content );
							$embeds = get_media_embedded_in_content( $content );
							echo $embeds[0];

						?>
				  	   	<h4 class="title font-weight-bold"><?php echo esc_attr($post->post_title)?></h4>
  	       				<?php  echo '<p class="text-justify category-group">' . $post->post_excerpt . '</p>' ?>
        			</div>
    			</div>
    			<div class="space">
    			<hr class="sc" />
    			</div>
			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


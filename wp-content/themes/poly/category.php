<?php
/**
 * The template for displaying Archive pages.
 *
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
				<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );?>

    			<div class="row content">
        			<div class="col-sm">
            			<img class="img-fluid" src="<?php echo esc_url( $large_image_url[0] )?>">
        			</div>
        			<div class="col-sm align-self-center">
  	       				<h4 class="title font-weight-bold"><?php echo esc_attr($post->post_title)?></h4>
  	       				<?php  echo '<p class="text-justify category-group">' . $post->post_excerpt . '</p>' ?>
            			<p class="text-justify category-group font-weight-bold"> <a href="<?php the_permalink()?>">(Baca Selengkapnya) </a></p>
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
<?php
/**
 * The template for displaying Archive pages.
 *
 * @package poly
 */

get_header(); ?>

		<?php if ( have_posts() ) : ?>
		<div class="container">
			<div class="row justify-content-center poly-category">
					<h1><?php single_cat_title(); ?></h1>
			</div><!-- .page-header -->


			<?php while ( have_posts() ) : the_post(); ?>

    			<div class="row content-poly">
				<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );?>
					<div class="col-sm image-poly">
            			<img class="img-fluid" src="<?php echo esc_url( $large_image_url[0] )?>">
        			</div>
        			<div class="col-sm align-self-center">
  	       				<h4 class="title font-weight-bold"><?php echo esc_attr($post->post_title)?></h4>
  	       				<?php  echo '<p class="text-justify category-group">' . wp_trim_words($post->post_content,55) . '</p>' ?>
            			<p class="text-justify category-group font-weight-bold"> <a href="<?php the_permalink()?>">(Baca Selengkapnya) </a></p>
					</div>
			<div class="w-100">
				<hr class="poly" />
					</div>
					</div>

			<?php endwhile; ?>
    			</div>
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * Template Name: Special Page
 *
 * @package poly
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

					<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );?>
				<div class="container-overlay">
					<img class="overlay img-fluid" src="<?php echo esc_url( $large_image_url[0] );?>">
					<?php the_title( '<h1 class="header center-overlay">', '</h1>' ); ?>
				</div>
						<div class="entry-content">
			<div class="row-single">
				<div class="col-sm single text-justify">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'poly' ) ); ?>
		</div>
	</div>
</div>

	<?php endwhile; ?>
>

<?php get_footer(); ?>

<?php
/**
 * Template Name: Special Page
 *
 * @package poly
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
					<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );?>
	<div class="card poly-header-overlay">
  		<img class="card-img" src="<?php echo esc_url( $large_image_url[0] );?>" alt="Card image">
  		<div class="card-img-overlay page-special">
    		<h1 class="card-title text-center poly-overlay"><?php the_title();?></h1>
  		</div>
	</div>
	<div class="container">
		<div class='content-page-special-poly'>
			<div>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'poly' ) ); ?>
			</div>
		</div>
	</div>

	<?php endwhile; ?>

<?php get_footer(); ?>

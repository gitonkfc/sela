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
    			<div class="row content-poly justify-content-center">
        			<div class="col-md-8">
			<?php 
			$youtube_url = get_post_meta($post->ID, 'youtube', true);
			$poster = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			echo do_shortcode('[video src="'.$youtube_url.'" poster="'.$poster[0].'" class="embed-responsive embed-responsive-1by1 wp-video-shortcode" width="750px" height="500px"]');?>
						<br>
				  	   	<a href="<?php echo get_permalink( $post );?>"><h4 class="title font-weight-bold"><?php echo esc_attr($post->post_title)?></h4></a>
						<br>
						<p class="text-justify category-group"><?php echo $post->post_excerpt;?></p>
        			</div>
        			<hr class="poly">
    			</div>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>


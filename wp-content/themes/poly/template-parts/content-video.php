<?php
/**
 * @package poly
 */
?>

<div class="container">
	<div class="row content-poly justify-content-center">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</div><!-- .entry-header -->

	<div class="row content-poly justify-content-center">
		<div class="col-md-8 text-justify">
			<?php 
			$youtube_url = get_post_meta($post->ID, 'youtube', true);
			$poster = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			echo do_shortcode('[video src="'.$youtube_url.'" poster="'.$poster[0].'" class="embed-responsive embed-responsive-1by1 wp-video-shortcode" width="750px" height="500px"]');?>
			<p>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'poly' ) ); ?>
		</div><!-- .entry-content -->

		<?php poly_author_bio(); ?>
	</div><!-- .entry-body -->

</div><!-- #post-## -->

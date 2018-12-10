<?php
/**
 * @package Sela
 */
?>

<article id="post-<?php the_ID(); ?>" class="site-main">

	

	<header class="site-main">
		<?php if ( is_single() ) : ?>
			<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );?>
			<div class="jumbotron jumbotron-fluid" style="background-image: url(<?php echo esc_url( $large_image_url[0] );?>);">
  <div class="container">
    <h1 class="card-title poly-single-overlay text-justify"><?php the_title();?></h1> 
  </div>
</div>

		<?php else : ?>
			<div class="container">
				<div class="row content-poly">
					<?php the_title( '<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
				</div>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="container">
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="row content-poly">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
				<div class="row content-poly">
					<div class="col-sm single text-justify">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sela' ) ); ?>
			<!-- .entry-content -->
		<?php endif; ?>



				</div>
	</div>
	</div><!-- .entry-body -->

</article><!-- #post-## -->

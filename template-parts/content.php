<?php
/**
 * @package Sela
 */
?>

<article id="post-<?php the_ID(); ?>" class="site-main">

	

	<header class="site-main">
		<?php if ( is_single() ) : ?>
			<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );?>
				<div class="header-container-overlay">
					<img class="header-overlay" src="<?php echo esc_url( $large_image_url[0] )?>">'
					<?php the_title( '<h1 class="header center-overlay">', '</h1>' ); ?>
				</div>
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<div class="row-single">
				<div class="col-sm single text-justify">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sela' ) ); ?>
<!-- .entry-content -->
		<?php endif; ?>

		<?php if ( is_single() && 'post' == get_post_type() ) : ?>
			<?php
			//for use in the loop, list 5 post titles related to first tag on current post
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				echo '<p class="related-title">Baca Juga</p>';
				$first_tag = $tags[0]->term_id;
				$args=array(
					'tag__in' => array($first_tag),
					'post__not_in' => array($post->ID),
					'posts_per_page'=>5,
					'caller_get_posts'=>1
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) { ?>
						<div class="row justify-content-center">				
					<?php 
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<div class="col-sm-3">
						<div><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail(array('thumbnail', array('class'=>'img-fluid'))); ?></a></div>
						<div><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title('<p class="related text-center">','</p>'); ?></a></div>
					</div>
 					<?php
					endwhile;?>
					</div>

				<?php }
				wp_reset_query();
			}
			?>
			</div>
		<?php endif; ?>
				</div>
	</div>
		</div>
	</div><!-- .entry-body -->

</article><!-- #post-## -->

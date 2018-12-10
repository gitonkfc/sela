<?php
get_header();
?>
		<section id="content">

			<div class="container">
				<div class="row content">
					<div class="col-sm space">
					<h1 class="text-center font-weight-bold"><?php single_cat_title(); ?></h1>
					<?php 
						$categories = get_the_category();
						$category_id = $categories[0]->cat_ID;
						$args = array ( 'category' => $category_id, 'posts_per_page' => 5);
						$myposts = get_posts( $args );
						if ( have_posts() ) : while ( have_posts() ) : the_post();
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
						?>
						</div>
						</div>
    			<div class="row content">
        			<div class="col-sm">
            			<img class="img-fluid" src="<?php echo esc_url( $large_image_url[0] )?>">
        			</div>
        			<div class="col-sm align-self-center">
  	       				<h4 class="title font-weight-bold"><?php echo esc_attr($post->post_title)?></h4>
  	       				<?php  echo '<p class="text-justify category-group">' . $post->post_excerpt . '</p>' ?>
            			<p class="text-justify category-group"> <a href="<?php the_permalink()?>">(Baca Selengkapnya) </a></p>
        			</div>
    			</div>
    			<div clas"space">
    			<hr/>
    		</div>
    			</div>
    			<?php 
    			    endwhile;
    else :
        _e('<p class="text-center">Post yang ada cari tidak ditemukan </p>', 'textdomain' );
    endif;?>


</div>
</section>


<?php
get_footer();
?>
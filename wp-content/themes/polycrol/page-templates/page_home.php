<?php 
/*
Template Name: Homepage
Template Post Type: post, page, event
*/
 get_header();?>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">


<?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
<?php endwhile; /* End loop */ ?>
</div>
</section>
<?php get_footer();?>
<?php
/**
 * The template used for displaying hero content in page.php and page-templates.
 *
 * @package poly
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="hero">
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'poly-page-thumbnail' ); ?>
		</div>
	</div><!-- .hero -->
<?php endif; ?>
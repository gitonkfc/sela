<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package poly
 */
?>

<div class="container">
	<div class="row content-none-poly justify-content-center">
		<div class="w-100">
			<h1 class="text-center"><?php _e( 'Maaf kata kunci yang anda cari tidak ditemukan', 'poly' ); ?></h1>
		</div>
		<div class="search-form">
			<?php get_search_form();?>
		</div>
	</div>
</div>
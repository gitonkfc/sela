<?php
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>

	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<meta name="author" content="SemiColonWeb" />
	<?php wp_head();?>
</head>
<body class="stretched">
		<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<?php $custom_logo_id = get_theme_mod('custom_logo');?>
						<?php $logo = wp_get_attachment_image_src($custom_logo_id, 'full');?>
						<a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="<?php echo esc_url($logo[0])?>" alt="Canvas Logo"></a>
						<a href="index.php" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="<?php echo esc_url($logo[0])?>" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
<?php wp_nav_menu( array( 'theme_location' => 'extra', 'container' => 'div', 'container_id' =>'top-cart', 'contaner_class'=> null) ); ?>
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => 'div', 'container_id' =>'top-search', ) ); ?>
<?php $walker = new Menu_With_Description; ?>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'nav', 'container_id' =>'primary-menu', 'container_class' => 'sub-title', 'walker'=> $walker, ) ); ?>
	

				</div>

			</div>

		</header><!-- #header end -->
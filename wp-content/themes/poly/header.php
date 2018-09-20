<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package poly
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<a class="skip-link screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'poly' ); ?>"><?php _e( 'Skip to content', 'poly' ); ?></a>

			<div class="container-fluid">
				<div class="row site-branding">
					<div class="col">
						<a href="http://localhost/polycroll/about-nicholas-laboratories/" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="<?php echo get_theme_mod('nicholas_logo');?>" class="img-fluid rounded float-left"></a>

					</div>
					<div class="col">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod('polycrol_logo');?>" class="img-fluid rounded float-left"></a>
					</div>
					<div class="col social">
						<img src="<?php echo get_theme_mod('social_logo');?>" class="img-fluid rounded float-right" usemap="#image-map">
						<map name="image-map">
    						<area target="" alt="facebook" title="facebook" href="<?php echo esc_url('www.facebook.com')?>" coords="15,17,13" shape="circle">
    						<area target="" alt="twitter" title="twitter" href="<?php echo esc_url('www.twitter.com')?>" coords="58,17,14" shape="circle">
    						<area target="" alt="instagram" title="instagram" href="<?php echo esc_url('www.instagram.com')?>" coords="104,19,15" shape="circle">
    						<area target="" alt="youtube" title="youtube" href="<?php echo esc_url('www.youtube.com')?>" coords="147,19,16" shape="circle">
						</map>
					</div>
					</div>
					</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'poly' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

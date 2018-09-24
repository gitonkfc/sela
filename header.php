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

			<div class="container">
				<div class="row">
					<div class="col-sm">
						<div class="secondary-logo">
							<a href="http://localhost/polycroll/about-nicholas-laboratories/"><img src="<?php echo get_theme_mod('nicholas_logo');?>"></a>
						</div>
					</div>
					<div class="col-sm">
						<div class="primary-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod('polycrol_logo');?>"></a>
						</div>
					</div>
					<div class="col-sm">
						<div class="row justify-content-end">
							<div class="col sociallist">
								<a href="<?php echo esc_url('www.facebook.com')?>"><img src="http://localhost/polycroll/wp-content/uploads/2018/09/fb-1.png" class="img-fluid"></a>
							</div>
							<div class="col sociallist">
								<a href="<?php echo esc_url('www.twitter.com')?>"><img src="http://localhost/polycroll/wp-content/uploads/2018/09/tw-1.png" class="img-fluid"></a>
							</div>
							<div class="col sociallist">
								<a href="<?php echo esc_url('www.instagram.com')?>"><img src="http://localhost/polycroll/wp-content/uploads/2018/09/ig-1.png" class="img-fluid"></a>
							</div>
							<div class="col sociallist">
								<a href="<?php echo esc_url('www.youtube.com')?>"><img src="http://localhost/polycroll/wp-content/uploads/2018/09/yt-1.png" class="img-fluid"></a>
							</div>
						</div>
					</div>
					</div>
					</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'poly' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

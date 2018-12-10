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

<body class="poly-body">
	<!---logo-->
    <div class="container">
    	<div class="row">
    		<div class="col-lg-4 mb-4">
          <div class="secondary-logo">
            <!-- get nicholas logo and url-->
	        <a href="<?php echo get_theme_mod('nicholas_url');?>"><img src="<?php echo get_theme_mod('nicholas_logo');?>" alt=""></a>
        	</div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="logo">
            <!-- get polycrol logo and url-->
			     <a href="<?php echo home_url('/');?>"><img src="<?php echo get_theme_mod('polycrol_logo');?>" alt=""></a>	
        	</div>
        </div>
            <div class="col-lg-4 mb-4">
            	 <div class="social-icon">
                    <!-- get social logo and url-->
            		<?php echo do_shortcode('[social_header]');?>
            	</div>
        </div>
    	</div>
    </div>
    <!--logo-->
		    <!-- Navigation -->
    <div class="navbar navbar-expand-lg navbar-dark nav-poly">
      <div class="container">
        <div></div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- get custom menu settings-->
        <?php $walker = new polycrol_menu_walker; ?>
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'container' => 'div', 
			'container_id' =>'navbarResponsive', 
			'container_class' => 'navbar-collapse collapse', 
			'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s</ul>',
			'walker'	=> $walker,
			) ); 
		?>
      </div>
    </div>
    <!-- End of Navigation -->

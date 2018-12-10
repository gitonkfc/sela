<?php?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<meta name="author" content="SemiColonWeb" />
	<?php wp_head();?>
	<title>Polycrol</title>
</head>
<body class="body">
	<div id="wraper clearfix">
		<header id="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="<?php echo get_theme_mod('nicholas_logo');?>" class="img-fluid rounded float-left"></a>

					</div>
					<div class="col">
						<?php $custom_logo_id = get_theme_mod('custom_logo');?>
						<?php $logo = wp_get_attachment_image_src($custom_logo_id, 'full');?>
						<a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="<?php echo esc_url($logo[0])?>" class="img-fluid rounded mx-auto d-block"></a>
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
					<div class="clearfix"></div>
<nav class="navbar navbar-expand-sm navbar-light justify-content-end">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'div', 'container_id' =>'navbarSupportedContent', 'container_class' => 'collapse navbar-collapse flex-grow-0', 'items_wrap' => '<ul id="%1$s" class="navbar-nav text-right">%3$s</ul>') ); ?>
        </ul>
    </div>
</nav>
				</div>
			</div>
		</header>
<?php 
/**
 * header.php
 *
 * The header for the theme.
 */

// Get the favicon.
$favicon16 = IMAGES . '/icons/favicon-16x16.png';
$favicon32 = IMAGES . '/icons/favicon-32x32.png';

// Get the custom touch icon.
$touch_icon = IMAGES . '/icons/apple-touch-icon-152x152-precomposed.png';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<!-- Fonts.com Web Font Code -->
	<link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/b907ee38-2d72-4de9-9a21-f4c200baee9a.css"/>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
    <link rel="shortcut icon" type="image/png" href="<?php echo $favicon32; ?>" sizes="32x32" />
    <link rel="shortcut icon" type="image/png" href="<?php echo $favicon16; ?>" sizes="16x16" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo $touch_icon; ?>" sizes="152x152"/>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5XHGRX"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5XHGRX');</script>
	<!-- End Google Tag Manager -->


		<!-- HEADER -->
		<header class="site-header"> 
			<div class="row">
				<div class="column medium-2">
					<div class="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
					</div>
				</div>
				<div class="column medium-10">
					<nav class="nav" role="navigation">
						<?php 
							wp_nav_menu(
								array(
									'theme_location' => 'main-menu',
									'menu_class' => 'site-menu'
								)
							);
						?>
					</nav>
				</div> <!-- end small-9 -->
			</div> <!-- end row -->
			<div data-150="opacity:0" data-650="opacity:1" class="main-nav-background"></div>




		</header> <!-- end site-header -->

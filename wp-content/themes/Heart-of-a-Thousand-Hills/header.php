<?php 
/**
 * header.php
 *
 * The header for the theme.
 */
?>

<?php 
	// Get the favicon.
	$favicon = IMAGES . '/icons/favicon.png';

	// Get the custom touch icon.
	$touch_icon = IMAGES . '/icons/apple-touch-icon-152x152-precomposed.png';
?>

<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<!-- Fonts.com Web Font Code -->
	<link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/dc5192c9-31e0-4816-96ca-1f1ab513cd27.css"/>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $touch_icon; ?>">

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
				<div class="medium-3">
					<div class="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
					</div>
				</div>
				<div class="medium-9">
					<nav class="site-navigation" role="navigation">
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
		</header> <!-- end site-header -->
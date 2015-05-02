<?php
/**
 * The header template.
 * 
 * @package tctheme
 * @since   1.0.0
 */



?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lt IE 9]>
			<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/app.css">
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

<div class="row">
<div class="large-12 columns">
<div class="nav-bar right">
<ul class="button-group">
<li><a href="#" class="button">Link 1</a></li>
<li><a href="#" class="button">Link 2</a></li>
<li><a href="#" class="button">Link 3</a></li>
<li><a href="#" class="button">Link 4</a></li>
</ul>
</div>
<h1><?php bloginfo( 'title' ); ?> <small><?php bloginfo( 'description' ); ?></small></h1>
<hr/>
</div>
</div>
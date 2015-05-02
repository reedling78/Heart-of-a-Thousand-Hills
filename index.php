<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

$environment = getenv('APP_ENV') ?: 'local';

if ($environment != 'production') {
	require( dirname( __FILE__ ) . '/wp-content/themes/Heart-of-a-Thousand-Hills/vendor/Dotenv.php' );
	Dotenv::load(__DIR__);
}


/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

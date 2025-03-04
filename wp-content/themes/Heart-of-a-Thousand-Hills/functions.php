<?php 

/**
 * functions.php
 *
 * The theme's functions and definitions.
 */


ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


/**
 * ----------------------------------------------------------------------------------------
 * 1.0 - Define constants.
 * ----------------------------------------------------------------------------------------
 */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/js' );
define( 'BOWER', THEMEROOT . '/bower_components' );
define( 'FRAMEWORK', get_template_directory() . '/framework' );


/**
 * ----------------------------------------------------------------------------------------
 * 2.0 - Load the framework.
 * ----------------------------------------------------------------------------------------
 */
require_once( FRAMEWORK . '/init.php' );


/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}


/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_setup' ) ) {
	function alpha_setup() {
		/**
		 * Make the theme available for translation.
		 */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'alpha', $lang_dir );

		/**
		 * Add support for post formats.
		 */
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio',
				'events'
			)
		);

		/**
		 * Add support for automatic feed links.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for post thumbnails.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'alpha' )
			)
		);
	}

	add_action( 'after_setup_theme', 'alpha_setup' );

	
}


/**
 * ----------------------------------------------------------------------------------------
 * 5.0 - Display meta information for a specific post.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_post_meta' ) ) {
	function alpha_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if ( get_post_type() === 'post' ) {
			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'alpha' ) . ' </li>';
			}

			// Get the post author.
			printf(
				'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);

			// Get the date.
			echo '<li class="meta-date"> ' . get_the_date() . ' </li>';

			// The categories.
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"> ' . $category_list . ' </li>';
			}

			// The tags.
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"> ' . $tag_list . ' </li>';
			}

			// Comments link.
			if ( comments_open() ) :
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __( 'Leave a comment', 'alpha' ), __( 'One comment so far', 'alpha' ), __( 'View all % comments', 'alpha' ) );
				echo '</span>';
				echo '</li>';
			endif;

			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __( 'Edit', 'alpha' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_paging_nav' ) ) {
	function alpha_paging_nav() { ?>
		<ul>
			<?php 
				if ( get_previous_posts_link() ) : ?>
				<li class="next">
					<?php previous_posts_link( __( 'Newer Posts &rarr;', 'alpha' ) ); ?>
				</li>
				<?php endif;
			 ?>
			<?php 
				if ( get_next_posts_link() ) : ?>
				<li class="previous">
					<?php next_posts_link( __( '&larr; Older Posts', 'alpha' ) ); ?>
				</li>
				<?php endif;
			 ?>
		</ul> <?php
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - Register the widget areas.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_widget_init' ) ) {
	function alpha_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
				array(
					'name' => __( 'Image Gallery', 'alpha' ),
					'id' => 'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'alpha' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);

			register_sidebar(
				array(
					'name' => __( 'Footer Widget Area', 'alpha' ),
					'id' => 'sidebar-2',
					'description' => __( 'Appears on the footer.', 'alpha' ),
					'before_widget' => '<div id="%1$s" class="widget small-3 %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
		}
	}

	add_action( 'widgets_init', 'alpha_widget_init' );
}

/**
 * ----------------------------------------------------------------------------------------
 * 8.0 - Function that validates a field's length.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_validate_length' ) ) {
	function alpha_validate_length( $fieldValue, $minLength ) {
		// First, remove trailing and leading whitespace
		return ( strlen( trim( $fieldValue ) ) > $minLength );
	}
}
if ( ! function_exists( 'new_excerpt_length' ) ) {
	function new_excerpt_length($length) {
		return 12;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
}

/**
 * ----------------------------------------------------------------------------------------
 * 10.0 - Load the custom scripts for the theme.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_scripts' ) ) {
	function alpha_scripts() {
		// Adds support for pages with threaded comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Register scripts
		//wp_register_script( 'alpha-custom', SCRIPTS . '/main.js', array( 'jquery' ), false, true );

		// Load the custom scripts
		wp_enqueue_script( 'alpha-custom' );

		// Load the stylesheets
		wp_enqueue_style( 'alpha-master', THEMEROOT . '/css/app.css' );

	}

	add_action( 'wp_enqueue_scripts', 'alpha_scripts' );
}

function create_posttype() {
	register_post_type( 'events',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Events' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'events'),
		)
	);
}
add_action( 'init', 'create_posttype' );

function add_custom_meta_box() {
    add_meta_box(
        'event_button_box', // $id
        'Event Button', // $title 
        'show_event_button_box', // $callback
        'events', // $page
        'side', // $context
        'default'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box');

function new_excerpt_more( $more ) {
	return ' ';
}
add_filter('excerpt_more', 'new_excerpt_more');
// Save the Data
function save_custom_meta($post_id) {

    //verify nonce
    if (!isset( $_POST['custom_meta_box_nonce'] ) || 
	    !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }

    $oldEventImage = get_post_meta($post_id, 'event_image', true);

    $newEventImage = $_POST['event_image'];
    if ($newEventImage && $newEventImage != $oldEventImage) {
        update_post_meta($post_id, 'event_image', $newEventImage);
    } elseif ('' == $newEventImage && $oldEventImage) {
        delete_post_meta($post_id, 'event_image', $oldEventImage);
    }
     
    $oldEventRadioButton = get_post_meta($post_id, 'event_button_selection', true);
    $newEventRadioButton = $_POST['event_button_selection'];
    if ($newEventRadioButton && $newEventRadioButton != $oldEventRadioButton) {
        update_post_meta($post_id, 'event_button_selection', $newEventRadioButton);
    } elseif ('' == $newEventRadioButton && $oldEventRadioButton) {
        delete_post_meta($post_id, 'event_button_selection', $oldEventRadioButton);
    }

    $oldEventBrightText = get_post_meta($post_id, 'eventBrightText', true);
    $newEventBrightText = $_POST['event_bright_text'];
    if ($newEventBrightText && $newEventBrightText != $oldEventBrightText) {
        update_post_meta($post_id, 'eventBrightText', $newEventBrightText);
    } elseif ('' == $newEventBrightText && $oldEventBrightText) {
        delete_post_meta($post_id, 'eventBrightText', $oldEventBrightText);
    }

    $oldGoogleMapText = get_post_meta($post_id, 'googleMapsText', true);
    $newGoogleMapText = $_POST['google_maps_text'];
    if ($newGoogleMapText && $newGoogleMapText != $oldGoogleMapText) {
        update_post_meta($post_id, 'googleMapsText', $newGoogleMapText);
    } elseif ('' == $newGoogleMapText && $oldGoogleMapText) {
        delete_post_meta($post_id, 'googleMapsText', $oldGoogleMapText);
    }

    $oldGoogleMapText = get_post_meta($post_id, 'eventDate', true);
    $newGoogleMapText = strtotime($_POST['event_date']);
    if ($newGoogleMapText && $newGoogleMapText != $oldGoogleMapText) {
        update_post_meta($post_id, 'eventDate', $newGoogleMapText);
    } elseif ('' == $newGoogleMapText && $oldGoogleMapText) {
        delete_post_meta($post_id, 'eventDate', $oldGoogleMapText);
    }
}
add_action('save_post', 'save_custom_meta');

add_action('admin_head','add_custom_scripts');
function add_custom_scripts() {
	if(is_admin()) {
    	wp_enqueue_script('jquery-ui-datepicker');
    	wp_enqueue_style('jquery-ui', get_template_directory_uri().'/css/jquery-ui.min.css');

		wp_enqueue_media();
 		wp_register_script('event-image', get_template_directory_uri().'/js/event-images.js', array( 'jquery' ));
 		wp_enqueue_script('event-image');

	}
    echo '<script type="text/javascript">
                jQuery(document).ready(function($) { $(".datepicker").datepicker();});
        </script>';
}




/**
 * ----------------------------------------------------------------------------------------
 * 11.0 - Registers a new settings field on the 'General Settings' page of the WordPress dashboard.
 * ----------------------------------------------------------------------------------------
 */
function ovn_initialize_theme_options() {

	// Define the settings field
	add_settings_field( 
		'flickr_tag', 					// The ID (or the name) of the field
		'flickr Tag', 					// The text used to label the field
		'ovn_flickr_tag_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);
	
	// Register the 'footer_message' setting with the 'General' section
	register_setting(
		'general',
		'flickr_tag'
	);

	// Define the settings field
	add_settings_field( 
		'facebook_url', 					// The ID (or the name) of the field
		'Facebook URL', 					// The text used to label the field
		'ovn_facebook_url_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);
	
	// Register the 'footer_message' setting with the 'General' section
	register_setting(
		'general',
		'facebook_url'
	);

	// Define the settings field
	add_settings_field( 
		'twitter_url', 					// The ID (or the name) of the field
		'Twitter URL', 					// The text used to label the field
		'ovn_twitter_url_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);


	// Register the 'footer_message' setting with the 'General' section
	register_setting(
		'general',
		'twitter_url'
	);


	// Define the settings field
	add_settings_field( 
		'instagram_url', 					// The ID (or the name) of the field
		'Instagram URL', 					// The text used to label the field
		'ovn_instagram_url_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);

	// Register the 'footer_message' setting with the 'General' section
	register_setting(
		'general',
		'instagram_url'
	);

	// Define the settings field
	add_settings_field( 
		'copyrightString', 					// The ID (or the name) of the field
		'copyright String', 					// The text used to label the field
		'ovn_copyrightString_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);	

	// Register the 'footer_message' setting with the 'General' section
	register_setting(
		'general',
		'copyrightString'
	);

	// Define the settings field
	add_settings_field( 
		'homePageTitle', 					// The ID (or the name) of the field
		'Home Page Title', 					// The text used to label the field
		'ovn_homePageTitle_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);	

	// Register the 'home page title' setting with the 'General' section
	register_setting(
		'general',
		'homePageTitle'
	);

	// Define the settings field
	add_settings_field( 
		'homePageSubTitle', 					// The ID (or the name) of the field
		'Home Page Sub Title', 					// The text used to label the field
		'ovn_homePageSubTitle_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);	

	// Register the 'home page sub title' setting with the 'General' section
	register_setting(
		'general',
		'homePageSubTitle'
	);

	// Define the settings field
	add_settings_field( 
		'donateMoneyTitle', 					// The ID (or the name) of the field
		'Donate Money Title', 					// The text used to label the field
		'ovn_donateMoneyTitle_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);	

	// Register the 'donate money title' setting with the 'General' section
	register_setting(
		'general',
		'donateMoneyTitle'
	);

// Define the settings field
	add_settings_field( 
		'donateMoneySubTitle', 					// The ID (or the name) of the field
		'Donate Money Sub Title', 					// The text used to label the field
		'ovn_donateMoneySubTitle_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);	

	// Register the 'donate money title' setting with the 'General' section
	register_setting(
		'general',
		'donateMoneySubTitle'
	);

	// Define the settings field
	add_settings_field( 
		'attendEventLink', 					// The ID (or the name) of the field
		'Attend Event LInk', 					// The text used to label the field
		'ovn_attendEventLink_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);	

	// Register the 'attend event' setting with the 'General' section
	register_setting(
		'general',
		'attendEventLink'
	);

} // end ovn_initialize_theme_options
add_action( 'admin_init', 'ovn_initialize_theme_options' );


/**
 * ----------------------------------------------------------------------------------------
 * 12.0 - Renders the input field for the 'Footer Message' setting in the 'General Settings' section.
 * ----------------------------------------------------------------------------------------
 */

function ovn_flickr_tag_display() {
	echo '<input type="text" name="flickr_tag" id="flickr_tag" value="' . get_option( 'flickr_tag' ) . '" />';
} // end ovn_flickr_tag_display

function ovn_facebook_url_display() {
	echo '<input type="text" name="facebook_url" id="facebook_url" value="' . get_option( 'facebook_url' ) . '" />';
} // end ovn_facebook_url_display

function ovn_twitter_url_display() {
	echo '<input type="text" name="twitter_url" id="twitter_url" value="' . get_option( 'twitter_url' ) . '" />';
} // end ovn_twitter_url_display

function ovn_instagram_url_display() {
	echo '<input type="text" name="instagram_url" id="instagram_url" value="' . get_option( 'instagram_url' ) . '" />';
} // end ovn_instagram_url_display

function ovn_copyrightString_display() {
	echo '<input type="text" name="copyrightString" id="copyrightString" value="' . get_option( 'copyrightString' ) . '" />';
} // end ovn_copyrightString_display

function ovn_homePageTitle_display() {
	echo '<input type="text" name="homePageTitle" id="homePageTitle" value="' . get_option( 'homePageTitle' ) . '" />';
} // end ovn_homePageTitle_display

function ovn_homePageSubTitle_display() {
	echo '<input type="text" name="homePageSubTitle" id="homePageSubTitle" value="' . get_option( 'homePageSubTitle' ) . '" />';
} // end ovn_homePageSubTitle_display


function ovn_donateMoneyTitle_display() {
	echo '<input type="text" name="donateMoneyTitle" id="donateMoneyTitle" value="' . get_option( 'donateMoneyTitle' ) . '" />';
} // end ovn_donateMoneyTitle_display

function ovn_donateMoneySubTitle_display() {
	echo '<input type="text" name="donateMoneySubTitle" id="donateMoneySubTitle" value="' . get_option( 'donateMoneySubTitle' ) . '" />';
} // end ovn_donateMoneySubTitle_display

function ovn_attendEventLink_display() {
	echo '<input type="text" name="attendEventLink" id="attendEventLink" value="' . get_option( 'attendEventLink' ) . '" />';
} // end ovn_donateMoneySubTitle_display


function show_event_button_box() {
	global $custom_meta_fields, $post;

	
// Use nonce for verification
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

	$eventImage = get_post_meta($post->ID, 'event_image', true);
	$eventImageSrc = wp_get_attachment_url( $eventImage );

	$radioButtonValue = get_post_meta($post->ID, 'event_button_selection', true);
	$eventBrightTextValue = get_post_meta($post->ID, 'eventBrightText', true);
	$googleMapsTextValue = get_post_meta($post->ID, 'googleMapsText', true);
	$eventDate = "";
	
	if (get_post_meta($post->ID, 'eventDate', true) != "") {
		$eventDate = date("m/d/Y", get_post_meta($post->ID, 'eventDate', true));
	}
	
     
    // Begin the field table and loop
    echo '<table class="form-table">';
    	echo '<tr><th><label for="upload_image">Event Image</label></th></tr>';
    	echo '<tr><td><input type="text" name="event_image" id="even_image" value="'.$eventImage.'" size="30" /><input type="button" id="event_image_button" class="button" value="Choose Image" /></td></tr>';
    	echo '<tr><th><label for="event_date">Event Date</label></th></tr>';
    	echo '<tr><td><input type="text" class="datepicker" name="event_date" id="eventDate" value="'.$eventDate.'" size="15" />
        <br /><span class="description">Enter the date of this event.</span></td></tr>';
    	echo '<tr><th><label for="event_button_selection">Event Button Selection</label></th></tr>';
    	echo '<tr><td>';
    	echo '<input type="radio" name=event_button_selection id="eventBright" value="eventBright"', $radioButtonValue == "eventBright" ? ' checked="checked"' : "", ' />
                <label for="eventBright">Event Bright</label><br />';
        echo '<input type="radio" name="event_button_selection" id="googleMap" value="googleMap"', $radioButtonValue == "googleMap" ? ' checked="checked"' : "", '/>
                <label for="googleMap">Google Map</label><br />';
    	echo '</td></tr>';
    	echo '<tr><th><label for="event_bright_test">Event Bright Url</label></th></tr>';
    	echo '<tr><td><input type="text" name="event_bright_text" id="eventBrightText" value="'.$eventBrightTextValue.'" size="30" />
        <br /><span class="description">Url to the event bright page.</span></td></tr>';
    	echo '<tr><th><label for="google_maps_text">Google Maps Url</label></th></tr>';
    	echo '<tr><td><input type="text" name="google_maps_text" id="googleMapsText" value="'.$googleMapsTextValue.'" size="30" />
        <br /><span class="description">Url to the google maps location.</span></td></tr>';
    echo '</table>'; // end table
}

function RequestPosts(){
	$currentPage = $_POST['page'];
 	$postsKey = $_POST['postsKey'];
 	$requestedYear = $_POST['requestedYear'];

 	if ($postsKey == 'next')
 	{
 		$currentPage = $currentPage + 1;
 	}
 	else if ($postsKey == 'previous')
 	{
 		$currentPage = $currentPage - 1;
 	}
 	else if ($postsKey == 'year')
 	{
 		$currentPage = 1;
 	}

 	$argsCurrent = array(
		'posts_per_page' => 6, 
		'paged' => $currentPage,
		'year' => $requestedYear,
		'post_status' => 'publish'
		);
 	$posts = get_posts($argsCurrent);

	$html = '<div class="row"><div class="columns small-8"><ul class="inline-list archive"><li>Archives</li>';
	global $wpdb;
	$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts ORDER BY post_date DESC");

	foreach($years as $year){
		$selectedClass = $year == $requestedYear ? 'selected' : '';
		$html = $html . '<li><a href="#" data-post-key="year" data-current-page="' . $currentPage . '" data-requested-year="' . $year . '" class="blog-page ' . $selectedClass . '" >' . $year . '</a></li>';
	}
	


	$previousPage = $currentPage - 1;
 	$argsPrevious= array(
		'posts_per_page' => 6, 
		'paged' => $previousPage,
		'year' => $requestedYear,
		'post_status' => 'publish'
	);
	$postsPrev = get_posts($argsPrevious);
	$prevCount = count($postsPrev);
	$prevEnabled = $prevCount > 0 && $previousPage > 0;
	$html = $html . '</ul></div><div class="columns small-4"><ul class="inline-list arrows">';
	$html = $html .'';
	if($prevEnabled){
		$html = $html . '<li><a class="blog-page" href="#"';
	}
	else{
		$html = $html . '<li><span class="blog-page disabled" ';
	}
	$html = $html . 'data-current-page="' . $currentPage . '" data-post-key="previous" data-requested-year="' . $requestedYear . '">';
	$html = $html . '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 73.7 74.2" enable-background="new 0 0 73.7 74.2" xml:space="preserve"><g><path fill="#C0C0AF" d="M73.1 40.6H13.6L42 69l-5 5L0 37l37-37l5 5L13.6 33.5h59.5V40.6z"/></g></svg>';
	if($prevEnabled){
		$html = $html . '</a></li>';
	}
	else{
		$html = $html . '</span></li>';
	}

	$nextPage = $currentPage + 1;
	$argsNext= array(
		'posts_per_page' => 6, 
		'paged' => $nextPage,
		'year' => $requestedYear,
		'post_status' => 'publish'
	);
	$postsNext = get_posts($argsNext);
	$nextCount = count($postsNext);
	$nextEnabled = $nextCount > 0;
	$html = $html . '';
	if($nextEnabled){
		$html = $html . '<li><a class="blog-page" href="#"';
	}
	else{
		$html = $html . '<li><span class="blog-page disabled" ';
	}
	$html = $html . ' data-current-page="' . $currentPage;
	$html = $html . '" data-post-key="next" data-requested-year="' . $requestedYear . '">';
	$html = $html . '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 73.7 74.2" enable-background="new 0 0 73.7 74.2" xml:space="preserve"><g><path fill="#C0C0AF" d="M73.3 37l-37 37l-5-5l28.4-28.4H0.3v-7.1h59.5L31.3 5.1l5-5L73.3 37z"/></g></svg>';
	if($nextEnabled){
		$html = $html . '</a></li>';
	}
	else{
		$html = $html . '</span></li>';
	}
	$html = $html . '</ul></div></div><div class="row"><div class="columns large-12"><ul class="large-block-grid-3 medium-block-grid-2 small-block-grid-1 list">';

	foreach ($posts as $value) {

		$postExcerpt = get_words($value -> post_content);
		$permaLink = get_permalink($value -> ID);

		$date = new DateTime($value -> post_date);
		$dateFormated = $date->format('n.j.Y');

		$html = $html . '<li>';
		$html = $html . '<date>' . $dateFormated . '</date>';
		$html = $html . '<h2><a href="' . $permaLink . '"  data-reveal-id="blog-post" data-post-id="' . $value->ID . '">' . $value -> post_title . '</a></h2>';
		$html = $html . '<p class="small">' . $postExcerpt . '<span> </span><a data-post-id="' . $value->ID . '" href="' . $permaLink . '" data-reveal-id="blog-post">Read More</a></p>';
		$html = $html . '</li>';
	}

	$html = $html . '</ul></div></div>';

    $response = json_encode( 
    	array(
    		'html' => $html
    		) 
    	);
 
    header( "Content-Type: application/json" );
    echo $response;
 
    exit;
}

add_action( 'wp_ajax_nopriv_RequestPosts', 'RequestPosts' );
add_action( 'wp_ajax_RequestPosts', 'RequestPosts' );

class PostLight
{
  public $title;
  public $content;
  public $postDate;
  public $postImageURL;
}

function RequestPost(){
  $postId = $_POST['postId'];
  $post = get_post($postId);

  if (isset($post)){
    $postLight = new PostLight;
    $postLight->title = $post->post_title;
    $postLight->content = $post->post_content;
    $imageObj = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
    if (isset($imageObj)){
      if (isset($imageObj[0])){
        $postLight->postImageURL = $imageObj[0];
      }
    }

    $date = new DateTime($post -> post_date);
    $dateFormated = $date->format('n.j.Y');
    $postLight->postDate = $dateFormated;

    $postImageURL = 

    $response = json_encode( 
      array(
        'post' => $postLight,
         'success' => true
        ) 
      );
 
    header( "Content-Type: application/json" );
    echo $response;
 
    exit;
  }
  else{
    $response = json_encode( 
      array(
         'success' => false
        ) 
      );
 
    header( "Content-Type: application/json" );
    echo $response;
 
    exit();
  }
}
add_action( 'wp_ajax_nopriv_RequestPost', 'RequestPost' );
add_action( 'wp_ajax_RequestPost', 'RequestPost' );

function get_words($sentence, $count = 12) {
  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  return $matches[0];
}

?>

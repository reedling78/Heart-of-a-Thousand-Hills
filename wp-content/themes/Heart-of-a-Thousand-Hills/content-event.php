
<?php
    $args = array(
      'post_type' => 'events',
      'posts_per_page' => 3,
      'meta_key'  => 'eventDate',
      'orderby'   => 'meta_value_num',
      'order' => "ASC"
      );
    $events = new WP_Query( $args );
    if( $events->have_posts() ) {
      while( $events->have_posts() ) {
        $events->the_post();
        $eventButtonType = get_post_meta($events->post->ID, 'event_button_selection', true);
        $eventDate = get_post_meta($events->post->ID, 'eventDate', true);
		if($eventDate < time()) {
			// don't show the event button for events that have already happened
			$eventButtonType = "";
		}
        ?>
           <div class="dark row event collapse" id="Events">
    <div class="column large-6">
        <div class="event-image" style="background-image:url('<?= (get_post_meta($post->ID, 'event_image', true) ?: IMAGES."/eventsDefault.png" ) ?>');"></div>
    </div>
    <div class="column large-6">
        <div class="dark event-description">
            <h3>- How We Help -</h3>
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <?php if($eventButtonType == "eventBright") {
                ?>
                <a href="<?= get_post_meta($post->ID, 'eventBrightText', true) ?>" class="button">
                    Buy Tickets
                </a>
                <?php 
            }
            else if($eventButtonType == "googleMap") {
                ?>
                <a href="<?= get_post_meta($post->ID, 'googleMapsText', true) ?>" class="button">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    xmlns:xlink="http://www.w3.org/1999/xlink" 
                    version="1.1" x="0px" y="0px" 
                    viewBox="0 0 73.7 100.8" 
                    enable-background="new 0 0 73.7 100.8" xml:space="preserve">
                    <g>
                        <path fill="#C9C859" d="M73.6 38.5c0 28.8-31.3 58.6-31.3 58.6c-4.5 4.2-7 3.9-11.1 0c0 0-30.9-29.9-30.9-58.6 c0-21 16.5-38.3 36.7-38.3C57.1 0.1 73.6 17.4 73.6 38.5z M54.3 36.8c0-9.6-7.8-17.4-17.4-17.4s-17.3 7.8-17.3 17.4 s7.7 17.3 17.3 17.3S54.3 46.4 54.3 36.8z"/>
                    </g>
                    </svg>
                    Find It
                </a>
                <?php
            } ?>
            
        </div>
    </div>
</div>


        <?php 
      } 
    } 
   ?>

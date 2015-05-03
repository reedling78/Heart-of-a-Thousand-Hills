
<div class="main-content large-8 columns" role="main">
<?php
    $args = array(
      'post_type' => 'events',
      'posts_per_page' => 2
      );
    $events = new WP_Query( $args );
    if( $events->have_posts() ) {
      while( $events->have_posts() ) {
        $events->the_post();
        ?>
          <div class="row event">
             <div class="column large-12">
                <div style="width:50%; min-height:698px; height:auto; background-image:url('<?= IMAGES ?>/eventsDefault.png'); background-repeat:none; float:left;"></div>
                    <div style="width:50%; background-color:#333333; float:right; min-height:698px; text-align:center; color:#c8660;">
                        <h2 style="color:#c8c660; text-transform:uppercase; font-size:15px;">- How We Help -</h2>

                        <h3 style="font-size:60px;"><?php the_title(); ?></h3>
                        <p style="color:#c8c660; font-size:25px;"><?php the_content(); ?></p>
                        <a href="#" class="button" style="text-decoration:none; text-transform:uppercase; color:#c8c660; font-size:15px; margin-top:65px;">Find It</a>
                    </div>
              </div>
           </div>


        <?php
      }
    }
  ?>
  </div>
<?php 
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
?>

		</div> <!-- end row -->
	</div> <!-- end container -->

	<!-- FOOTER -->
	<footer class="site-footer" id="Footer">
		<div class="row">
			<?php get_sidebar( 'footer' ); ?>
			 <div class="column large-12 footer" style="background: url('<?= IMAGES ?>/smilingKids-Full.png') no-repeat center; background-color:#000; background-size:cover;">
                 <ul class="inline-list">
                    <li><a href="<?=get_option('facebook_url')?>" target="_blank"><img src="<?= IMAGES ?>/facebook.svg" width="18" alt="facebook" /></a></li>
                    <li><a href="<?=get_option('twitter_url')?>" target="_blank"><img src="<?= IMAGES ?>/twitter.svg" width="36" alt="twitter" /></a></li>
                    <li><a href="<?=get_option('instagram_url')?>" target="_blank"><img src="<?= IMAGES ?>/instagram.svg" width="36" alt="instagram" /></a></li>
                </ul>
                <div class="copyright">
                    <p>
                        &copy; <?php echo date( 'Y' ); ?>
                        <?php echo get_option('copyrightString') ?>
                        <?php _e( 'All rights reserved.', 'alpha' ); ?>
                    </p>
                </div> <!-- end copyright -->
            </div> <!-- end footer row -->
		</div> <!-- end row -->
	</footer> <!-- end site-footer -->


<div id="DonateForm" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="namespace donation-form ">
  <?php echo do_shortcode('[seamless-donations]'); ?>
  </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="ContentForm" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
 <?php echo do_shortcode('[contact-form-7 id="17" title="Contact form 1"]'); ?>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="blog-post" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <img data-blog-image />
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    <div class="row">
      <div class="columns large-8 medium-10 small-centered">
        <div data-blog-post>
          <h3 data-post-date></h3>
          <h2 id="modalTitle" data-post-title></h2>
          <div data-post-content>

          </div>
      </div>
      </div>
    </div>
</div>



  </div>
</div>


	<?php wp_footer(); ?>
	<script data-main="<?=SCRIPTS?>/main" src="<?=BOWER?>/requirejs/require.js"></script>
</body>
</html>
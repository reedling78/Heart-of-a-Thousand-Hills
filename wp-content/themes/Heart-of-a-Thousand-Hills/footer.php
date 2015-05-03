<?php 
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
?>

		</div> <!-- end row -->
	</div> <!-- end container -->

<div id="DonateForm" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <?php echo do_shortcode('[contact-form-7 id="17" title="Contact form 1"]'); ?>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="ContentForm" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <?php echo do_shortcode('[contact-form-7 id="17" title="Contact form 1"]'); ?>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>



	<!-- FOOTER -->
	<footer class="site-footer">
		<div class="row">
			<?php get_sidebar( 'footer' ); ?>
			 <div class="column large-12 footer" style="background: url('<?= IMAGES ?>/footer-Image.png') no-repeat center; background-size:cover;">
                 <ul class="inline-list">
                    <li><a href="https://www.facebook.com/heartofathousandhills" target="_blank"><img src="<?= IMAGES ?>/facebook.svg" width="18" alt="facebook" /></a></li>
                    <li><a href="https://twitter.com/HeartofHills" target="_blank"><img src="<?= IMAGES ?>/twitter.svg" width="36" alt="twitter" /></a></li>
                    <li><a href="https://instagram.com/heartofthehills/" target="_blank"><img src="<?= IMAGES ?>/instagram.svg" width="36" alt="instagram" /></a></li>
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

	<?php wp_footer(); ?>
	<script data-main="<?=SCRIPTS?>/main" src="<?=BOWER?>/requirejs/require.js"></script>
</body>
</html>
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
	<footer class="site-footer">
		<div class="row">
			<?php get_sidebar( 'footer' ); ?>
			 <div class="column large-12 footer" style="background: url('<?= IMAGES ?>/smilingKids-Full.png') no-repeat center; background-color:#000; background-size:cover;">
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


<div id="DonateForm" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <?php echo do_shortcode('[contact-form-7 id="17" title="Contact form 1"]'); ?>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="ContentForm" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <?php echo do_shortcode('[contact-form-7 id="17" title="Contact form 1"]'); ?>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="blog-post" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <img src="<?= IMAGES ?>/footer-Image.png" style="width:100%; height:auto;" />
    <h3>Date</h3>
    <h2 id="modalTitle">Blog title lorem ipsum</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet nisi a tempus sagittis. Vestibulum nisl mi, laoreet sit amet aliquam ut, varius nec odio. Suspendisse porta quis dui eu condimentum. Sed est velit, auctor quis ornare eu, viverra eleifend risus. Morbi nec nunc et eros venenatis placerat. Pellentesque dolor est, gravida in mi et, vestibulum vehicula felis. Ut id nunc nulla. Etiam ultrices eros eget enim facilisis congue. Pellentesque luctus imperdiet eros. Donec leo elit, tincidunt non ullamcorper at, posuere ac sem. Donec in augue vitae lorem tincidunt condimentum.</p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

	<?php wp_footer(); ?>
	<script data-main="<?=SCRIPTS?>/main" src="<?=BOWER?>/requirejs/require.js"></script>
</body>
</html>
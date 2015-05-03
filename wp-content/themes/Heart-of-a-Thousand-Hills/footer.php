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
		<div class="container">
			<?php get_sidebar( 'footer' ); ?>
			 <div class="column large-12 footer">
                 <ul class="inline-list">
                    <li><a href="https://www.facebook.com/heartofathousandhills" target="_blank"><img src="<?= IMAGES ?>/facebook.svg" alt="facebook" /></a></li>
                    <li><a href="https://twitter.com/HeartofHills" target="_blank"><img src="<?= IMAGES ?>/twitter.svg" alt="twitter" /></a></li>
                    <li><a href="https://instagram.com/heartofthehills/" target="_blank"><img src="<?= IMAGES ?>/instagram.svg" alt="instagram" /></a></li>
                </ul>
                <div class="copyright">
                    <p>
                        &copy; <?php echo date( 'Y' ); ?>
                        <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
                        <?php _e( 'All rights reserved.', 'alpha' ); ?>
                    </p>
                </div> <!-- end copyright -->
            </div> <!-- end footer row -->
		</div> <!-- end container -->
	</footer> <!-- end site-footer -->

	<?php wp_footer(); ?>
	<script data-main="<?=SCRIPTS?>/main" src="<?=BOWER?>/requirejs/require.js"></script>
</body>
</html>
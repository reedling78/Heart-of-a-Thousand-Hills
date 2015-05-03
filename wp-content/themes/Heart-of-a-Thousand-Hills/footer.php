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
			 <div class="column large-12 footer" style="background: url('<?= IMAGES ?>/footer-Image.png') no-repeat center; background-size:cover;">
                 <ul class="inline-list">
                    <li><a href="https://www.facebook.com/heartofathousandhills" target="_blank"><img src="<?= IMAGES ?>/facebook.svg" width="18px" alt="facebook" /></a></li>
                    <li><a href="https://twitter.com/HeartofHills" target="_blank"><img src="<?= IMAGES ?>/twitter.svg" width="36px" alt="twitter" /></a></li>
                    <li><a href="https://instagram.com/heartofthehills/" target="_blank"><img src="<?= IMAGES ?>/instagram.svg" width="36px" alt="instagram" /></a></li>
                </ul>
                <div class="copyright">
                    <p>
                        Copyright &copy; <?php echo date( 'Y' ); ?>
                        <?php echo get_option('copyright') ?>
                    </p>
                </div> <!-- end copyright -->
            </div> <!-- end footer -->
		</div> <!-- end container -->
	</footer> <!-- end site-footer -->

	<?php wp_footer(); ?>
	<script data-main="<?=SCRIPTS?>/main" src="<?=BOWER?>/requirejs/require.js"></script>
</body>
</html>
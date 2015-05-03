<?php
/**
 * The footer template.
 * 
 * @package tctheme
 * @since   1.0.0
 */
?>


<footer class="row">
<div class="large-12 columns">
<hr/>
<div class="row">
<div class="large-6 columns">
<p id="footer">&copy; <?php echo get_theme_mod( 'tctheme_footer_message' ); ?></p>
</div>
<div class="large-6 columns">
<ul class="inline-list right">
<li><a href="<?php echo get_option('facebook_url') ?>">Facebook</a></li>
<li><a href="#">Link 2</a></li>
<li><a href="#">Link 3</a></li>
<li><a href="#">Link 4</a></li>
</ul>
</div>
</div>
</div>
</footer>




	
	<script data-main="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main" src="<?php echo esc_url( get_template_directory_uri() ); ?>/bower_components/requirejs/require.js"></script>
	<?php wp_footer(); ?>
	</body>
</html>



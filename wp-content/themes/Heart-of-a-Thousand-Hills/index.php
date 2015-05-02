<?php 
/**
 * index.php
 *
 * The main template file.
 */
 ?>
<<<<<<< Updated upstream

<?php get_header(); ?>

=======
<?php get_header();?>
<h1>whatever</h1>
	<div class="main-content large-8 columns" role="main">
		<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
>>>>>>> Stashed changes

<!-- CONTENT AREA 1 - IN BETA -->
<div class="video-bg">
	<video autoplay="" loop="" style="visibility: visible; margin: auto; position: absolute; z-index: -1; top: 50%; left: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%); width: 100%; height: auto;">
		<source src="http://localhost:8888/Heart-of-a-Thousand-Hills/wp-content/uploads/2015/05/HighFives-min.mp4" type="video/mp4">
		<source src="../video/background.webm" type="video/webm">
		<source src="../video/background.ogv" type="video/ogg">
	</video>
</div>

<div class="container">
	<div class="row">
		<h1>The children of Rwanda</h1>
		<p>Bringing school supplies, uniforms and the hope of a better tomorrow.</p>
	</div>
</div>

<!-- END CONTENT AREA 1 -->


<?php get_footer(); ?>
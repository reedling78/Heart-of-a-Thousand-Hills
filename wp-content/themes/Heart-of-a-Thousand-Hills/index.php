<?php 
/**
 * index.php
 *
 * The main template file.
 */
 ?>

<?php get_header(); ?>


<!-- CONTENT AREA 1 -->

<div class="row start">
	<div class="column large-12">
		<video autoplay="" loop="">
			<source src="<?= IMAGES ?>/HighFives-min.mp4" type="video/mp4">
			<source src="<?= IMAGES ?>/HighFives-min.webm" type="video/webm">
			<source src="<?= IMAGES ?>/HighFives-min.ogg" type="video/ogg">
		</video>
		<div class="content">
			<h3>- Heart of A Thousand Hills -</h3>
			<h1>The children of Rwanda</h1>
			<p>Bringing school supplies, uniforms and the hope of a better tomorrow.</p>
		</div>
	</div>
</div>

<!-- END CONTENT AREA 1 -->

<!-- CONTENT AREA 2 - IN BETA -->



<!-- END CONTENT AREA 2 -->
        
<!-- CONTENT AREA 3 -->
<?php require_once('content-event.php'); ?>
<!-- END CONTENT AREA 3 -->

<!-- CONTENT AREA 5 -->

<div class="row donate">
	<div class="column large-6 seaweed">
		<h3>- Donate Money -</h3>
		<h2>Your Money</h2>
		<p>Buys supplies.</p>
		<p><a href="#" class="button" data-reveal-id="myModal">Donate Now</a></p>
	</div>
	<div class="column large-6 keylime">
		<h3>- Donate Time -</h3>
		<h2>Your Time</h2>
		<p>Makes a huge difference.</p>
		<p><a href="#" class="button" data-reveal-id="myModal">Sign Me Up</a></p>
	</div>
	<a href="#" class="event-button seaweed">
		<div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="32px" height="32px" viewBox="1.6 -3.2 32.0 43.2" enable-background="new 0 0 32 32" xml:space="preserve"><g><path fill="#000000" d="M29.334 3H25V1c0-0.553-0.447-1-1-1s-1 0.447-1 1v2h-6V1c0-0.553-0.448-1-1-1s-1 0.447-1 1v2H9V1 c0-0.553-0.448-1-1-1S7 0.4 7 1v2H2.667C1.194 3 0 4.2 0 5.666v23.667C0 30.8 1.2 32 2.7 32h26.667 C30.807 32 32 30.8 32 29.333V5.666C32 4.2 30.8 3 29.3 3z M30 29.333C30 29.7 29.7 30 29.3 30H2.667 C2.299 30 2 29.7 2 29.333V5.666C2 5.3 2.3 5 2.7 5H7v2c0 0.6 0.4 1 1 1s1-0.447 1-1V5h6v2c0 0.6 0.4 1 1 1 s1-0.447 1-1V5h6v2c0 0.6 0.4 1 1 1s1-0.447 1-1V5h4.334C29.701 5 30 5.3 30 5.666V29.333z"/><rect x="7" y="12" fill="#000000" width="4" height="3"/><rect x="7" y="17" fill="#000000" width="4" height="3"/><rect x="7" y="22" fill="#000000" width="4" height="3"/><rect x="14" y="22" fill="#000000" width="4" height="3"/><rect x="14" y="17" fill="#000000" width="4" height="3"/><rect x="14" y="12" fill="#000000" width="4" height="3"/><rect x="21" y="22" fill="#000000" width="4" height="3"/><rect x="21" y="17" fill="#000000" width="4" height="3"/><rect x="21" y="12" fill="#000000" width="4" height="3"/></g></svg></div>
		Let's Attend An Event
	</a>
</div>

<!-- END CONTENT AREA 5 -->

<!-- CONTENT AREA 6 - IN BETA -->
<?php require_once('content-blog.php'); ?>
<!-- END CONTENT AREA 6 -->


<?php get_footer(); ?>
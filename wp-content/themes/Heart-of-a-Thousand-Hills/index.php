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
        
<!-- CONTENT AREA 3 - IN BETA -->
<div class="row event collapse">
    <div class="column large-6 medium-3">
        <div class="event-image" style="background-image:url('<?= IMAGES ?>/eventsDefault.png');"></div>
    </div>
    <div class="column large-6 medium-9">
        <div class="dark event-description">
            <h3>- How We Help -</h3>
            <h2>Event title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit eleifend ligula, in interdum diam aliquet vel.</p>
            <a href="#" class="button"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 73.7 100.8" enable-background="new 0 0 73.7 100.8" xml:space="preserve"><g><path fill="#C9C859" d="M73.6 38.5c0 28.8-31.3 58.6-31.3 58.6c-4.5 4.2-7 3.9-11.1 0c0 0-30.9-29.9-30.9-58.6 c0-21 16.5-38.3 36.7-38.3C57.1 0.1 73.6 17.4 73.6 38.5z M54.3 36.8c0-9.6-7.8-17.4-17.4-17.4s-17.3 7.8-17.3 17.4 s7.7 17.3 17.3 17.3S54.3 46.4 54.3 36.8z"/></g></svg>Find It</a>
        </div>
    </div>
</div>
<?php require_once('content-event.php'); ?>
<!-- END CONTENT AREA 3 -->

<!-- CONTENT AREA 5 - IN BETA -->

<div class="row donate">
	<div class="column large-6 seaweed">
	</div>
	<div class="column large-6 keylime">
	</div>
</div>

<!-- END CONTENT AREA 5 -->


<?php get_footer(); ?>
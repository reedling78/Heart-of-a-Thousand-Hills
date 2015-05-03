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
<div class="row event">
    <div class="column large-12">
        <div class="event-image" style="background-image:url('<?= IMAGES ?>/eventsDefault.png');"></div>
        <div class="dark green event-description">
            <h3>- How We Help -</h3>
            <h2>Event title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit eleifend ligula, in interdum diam aliquet vel.</p>
            <a href="#" class="button"><img src="<?= IMAGES ?>/locationIcon.svg" alt="">Find It</a>
        </div>
    </div>
</div>
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
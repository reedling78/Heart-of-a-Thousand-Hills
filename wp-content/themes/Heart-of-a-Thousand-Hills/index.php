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
			<h2>- Heart of A Thousand Hills -</h2>
			<h1>The children of Rwanda</h1>
			<p>Bringing school supplies, uniforms and the hope of a better tomorrow.</p>
		</div>
	</div>
</div>

<!-- END CONTENT AREA 1 -->
        
<!-- CONTENT AREA 3 - IN BETA -->
<div class="row event">
    <div class="column large-12">
        <div style="width:50%; min-height:698px; height:auto; background-image:url('<?= IMAGES ?>/eventsDefault.png'); background-repeat:none; float:left;"></div>
        <div style="width:50%; background-color:#333333; float:right; min-height:698px; text-align:center; color:#c8660;">
            <h2 style="color:#c8c660; text-transform:uppercase; font-size:15px;">- How We Help -</h2>
            <h3 style="font-size:60px;">Event title</h3>
            <p style="color:#c8c660; font-size:25px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit eleifend ligula, in interdum diam aliquet vel.</p>
            <a href="#" class="button" style="text-decoration:none; text-transform:uppercase; color:#c8c660; font-size:15px; margin-top:65px;">Find It</a>
        </div>
    </div>
</div>
<!-- END CONTENT AREA 3 -->


<?php get_footer(); ?>
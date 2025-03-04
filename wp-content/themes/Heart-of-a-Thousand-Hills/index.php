<?php 
/**
 * index.php
 *
 * The main template file.
 */
 ?>

<?php get_header(); ?>



<!-- END SUCCESS MESSAGE -->


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
			<h1>Empowering<br>Children of Rwanda</h1>
			<p>Bringing school supplies, uniforms and the hope of a better tomorrow.</p>
		</div>
	</div>
</div>

<!-- END CONTENT AREA 1 -->

<!-- CONTENT AREA 2 - IN BETA 
<div class="row about keylime" id="WhoWeAre">
	<div class="arc" style="top: -117px;">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 1500 150" enable-background="new 0 0 1500 150" xml:space="preserve">
		<path fill="#d5d45e" d="M546.4 28c510.6 0 952.6 94 952.6 94H0C0 122 137 28 546.4 28z"/>
		</svg>
	</div>

	<?php
		$the_query = new WP_Query( 'page_id=26' );
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
		        the_content();
		endwhile;
		wp_reset_postdata();
	?>
</div>

-->
<div class="row about keylime" id="WhoWeAre">
	<div class="arc" style="top: 0px;">
		<svg class="yellow-hill" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 28 1500 94" enable-background="new 0 28 1500 94" xml:space="preserve">
<path fill="#d5d45e" d="M546.4,28c510.6,0,952.6,94,952.6,94H0C0,122,137,28,546.4,28z"/>
</svg>
	</div>
	<div class="column large-6 keylime">
		<div class="content-area">
				<h3>- Who We Are -</h3>
				<h2>Rwandan</h2>
				<p class="small">Based in Chicago, Heart of a Thousand Hills (HOTH) is a registered 501(c)(3) charity organization. The mission of Heart of a Thousand Hills is to provide essential school supplies and uniforms for vulnerable children in Rwanda to support their educational pursuit. Founded in 2014 by Nina Iliza, who wanted to honor her mother, a victim of the Rwandan genocide of 1994, and to inspire current day orphans and street kids in Rwanda by supporting their pursuit of a proper education.</p>
				<div class="avatar">
					<img src="<?= IMAGES ?>/Mandela.jpg" alt="Nelson Mandela" />
				</div>
				<p class="small quote">"Education is the  most powerful weapon which you can use to change the world."</p>
				<p class="small">- Nelson Mandela</p>
		</div>
	</div>
	<div class="column large-6 keylime">
		<div class="content-area">
				<h3>- What We Do -</h3>
				<h2>Give Supplies</h2>
				<p class="small">The first successful fundraising initiative allowed Heart of a Thousand Hills to purchase school uniforms and supplies for 60 disadvantaged Rwandan school children. These children did not have the basic necessities, such as writing material, book bags and uniforms (which are are a requirement).  In December 2014 Nina travelled back to Rwanda and worked directly with local suppliers and the charity Umuryango Children's Network. The results and feedback were truly inspiring and uplifting.</p>
				<div class="avatar">
						<img src="<?= IMAGES ?>/malala-yousafzai.jpg" alt="Malala Yousafzai" />
				</div>
					<p class="small quote">"One child, one teacher, one book, and one pen, can change the world."</p>
					<p class="small">- Malala Yousafzai</p>
			</div>
	</div>
</div>

<!-- END CONTENT AREA 2 -->
<div class="row board" id="MeetUs">
	<div class="column large-12">
		<h3>- Meet Us -</h3>
		<h2>The advisors</h2>
		<p>They're always working hard to get Rwanda's children what they need</p>
		<p><a href="#" class="button" data-reveal-id="ContentForm">Join Our Board</a>
	</div>
</div>


       
<!-- CONTENT AREA 3 -->
<?php require_once('content-event.php'); ?>
<!-- END CONTENT AREA 3 -->

<div class="row" style="z-index: 999999999; position: relative; background-color:#333333;">
	<div class="column large-12">
<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	$api_key = '165611a9b8940c3f394c3184ff287a4e';

	$tag = get_option('flickr_tag');
	$perPage = 24;
	$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
	$url.= '&api_key='.$api_key;
	$url.= '&tags='.$tag;
	//$url.= '&user_id=132915815@N03';
	$url.= '&per_page='.$perPage;
	$url.= '&format=json';
	$url.= '&nojsoncallback=1';

	$response = json_decode(file_get_contents($url));
	$photo_array = $response->photos->photo;

	echo "<ul class=\"gridder\">";

	foreach($photo_array as $single_photo){ 
		$farm_id = $single_photo->farm;
		$server_id = $single_photo->server;
		$photo_id = $single_photo->id;
		$secret_id = $single_photo->secret;
		$size = 'q';
		$title = $single_photo->title;
		$photo_url = 'http://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_'.$size.'.'.'jpg';

		echo "<li class=\"gridder-list\" data-griddercontent=\"#$photo_id\">";
	    echo "<img src=\"$photo_url\" />";
	    echo "</li>";

	}
	echo "</ul>";

	foreach($photo_array as $single_photo){ 
		$farm_id = $single_photo->farm;
		$server_id = $single_photo->server;
		$photo_id = $single_photo->id;
		$secret_id = $single_photo->secret;
		$size = 'b';
		$title = $single_photo->title;
		$photo_url = 'http://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_'.$size.'.'.'jpg';

		echo "<div id=\"$photo_id\" class=\"gridder-content\">";
		echo "<img src=\"$photo_url\" />";
		echo "</div>";
	}
?>
	</div>
</div>



<!-- CONTENT AREA 5 -->

<div class="row donate" id="Donate">
	<div class="column large-6 seaweed">
		<h3>- Donate Money -</h3>
		<h2>Your Money</h2>
		<p>Buys supplies.</p>
		<p><a href="#" class="button" data-reveal-id="DonateForm">Donate Now</a></p>
	</div>
	<div class="column large-6 keylime">
		<h3>- Donate Time -</h3>
		<h2>Your Time</h2>
		<p>Makes a huge difference.</p>
		<p><a href="#" class="button" data-reveal-id="ContentForm">Sign Me Up</a></p>
	</div>
	<a href="#Events" class="event-button seaweed clicker">
		<div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="32px" height="32px" viewBox="1.6 -3.2 32.0 43.2" enable-background="new 0 0 32 32" xml:space="preserve"><g><path fill="#000000" d="M29.334 3H25V1c0-0.553-0.447-1-1-1s-1 0.447-1 1v2h-6V1c0-0.553-0.448-1-1-1s-1 0.447-1 1v2H9V1 c0-0.553-0.448-1-1-1S7 0.4 7 1v2H2.667C1.194 3 0 4.2 0 5.666v23.667C0 30.8 1.2 32 2.7 32h26.667 C30.807 32 32 30.8 32 29.333V5.666C32 4.2 30.8 3 29.3 3z M30 29.333C30 29.7 29.7 30 29.3 30H2.667 C2.299 30 2 29.7 2 29.333V5.666C2 5.3 2.3 5 2.7 5H7v2c0 0.6 0.4 1 1 1s1-0.447 1-1V5h6v2c0 0.6 0.4 1 1 1 s1-0.447 1-1V5h6v2c0 0.6 0.4 1 1 1s1-0.447 1-1V5h4.334C29.701 5 30 5.3 30 5.666V29.333z"/><rect x="7" y="12" fill="#000000" width="4" height="3"/><rect x="7" y="17" fill="#000000" width="4" height="3"/><rect x="7" y="22" fill="#000000" width="4" height="3"/><rect x="14" y="22" fill="#000000" width="4" height="3"/><rect x="14" y="17" fill="#000000" width="4" height="3"/><rect x="14" y="12" fill="#000000" width="4" height="3"/><rect x="21" y="22" fill="#000000" width="4" height="3"/><rect x="21" y="17" fill="#000000" width="4" height="3"/><rect x="21" y="12" fill="#000000" width="4" height="3"/></g></svg></div>
		Let's Attend An Event
	</a>
</div>


<!-- END CONTENT AREA 5 -->

<!-- CONTENT AREA 6 - IN BETA -->
<?php require_once('content-blog.php'); ?>
<!-- END CONTENT AREA 6 -->


<?php get_footer(); ?>
<?php
/*Template Name: ContactForm*/

?>
<?php wp_head(); ?>
<link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/dc5192c9-31e0-4816-96ca-1f1ab513cd27.css"/>

<div class="namespace contact-form">

<h1>Contact us</h1>

<div class="contactFields">
	<div class="row bottomBorder">
		<div class="large-6 columns rightBorder">
		<input type="text" name"firstname" placeholder="First Name"/>
		</div>
		<div class="large-6 columns">
		<input type="text" name"lastname" placeholder="Last Name"/>
		</div>
	</div>
	<div class="row bottomBorder">
		<div class="large-6 columns rightBorder">
		<input type="text" name"organization" placeholder="Organization"/>
		</div>
		<div class="large-6 columns">
		<input type="text" name"email" placeholder="Email"/>
		</div>
	</div>
	<div class="row bottomBorder">
		<div class="large-6 columns rightBorder">
		<input type="text" name"address1" placeholder="Street Address"/>
		</div>
		<div class="large-6 columns">
		<input type="text" name"address2" placeholder="Address Line 2"/>
		</div>
	</div>
	<div class="row bottomBorder">
		<div class="large-6 columns rightBorder">
		<input type="text" name"city" placeholder="City"/>
		</div>
		<div class="large-6 columns">
		<input type="text" name"state" placeholder="State"/>
		</div>
	</div>
	<div class="row">
		<div class="large-6 columns rightBorder">
		<input type="text" name"zip" placeholder="Zip Code"/>
		</div>
		<div class="large-6 columns">
		<input type="text" name"phone" placeholder="Phone"/>
		</div>
	</div>
</div>

<div class="contactCheckboxes">
	<div class="row">
		<div class="large-6 columns">
		
		<p>I'm interested in:</p>		
		<label><input type="checkbox"/> Volunteer Opportunities</label>
		<label><input type="checkbox"/> Advisory Board</label>
		<label><input type="checkbox"/> Event Planning</label>
		<label><input type="checkbox"/> Corporate Donations/Grants</label>
		<label><input type="checkbox"/> Other</label>
		<input type="submit" value="Submit" class="btn"/>
		</div>
	</div>
</div>

</div>
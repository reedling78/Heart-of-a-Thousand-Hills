
<div class="blog-list dark">
	<div class="row">
		<div class="columns medium-6">
			<ul class="inline-list archive">
				<li>Archives</li>
				<li><a href="#" class="selected">2013</a></li>
				<li><a href="#">2014</a></li>
				<li><a href="#">2015</a></li>
			</ul>
		</div>
		<div class="columns medium-6">
			<ul class="inline-list arrows">
				<li><a href="#" class="disabled"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 73.7 74.2" enable-background="new 0 0 73.7 74.2" xml:space="preserve"><g><path fill="#C0C0AF" d="M73.1 40.6H13.6L42 69l-5 5L0 37l37-37l5 5L13.6 33.5h59.5V40.6z"/></g></svg></a></li>
				<li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 73.7 74.2" enable-background="new 0 0 73.7 74.2" xml:space="preserve"><g><path fill="#C0C0AF" d="M73.3 37l-37 37l-5-5l28.4-28.4H0.3v-7.1h59.5L31.3 5.1l5-5L73.3 37z"/></g></svg></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="columns large-12">
			<ul class="large-block-grid-3 medium-block-grid-2 small-block-grid-1 list">

				<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array('posts_per_page' => 6, 'paged' => $paged );
				query_posts($args); ?>
				<!-- the loop -->
				<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
					<li>
					<date><?php the_date('n.j.Y'); ?></date>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="small"><?php the_excerpt();  ?><a href="<?php the_permalink(); ?>">Read More</a></p>
				</li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>r
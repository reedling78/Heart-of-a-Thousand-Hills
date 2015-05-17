<?php 
$args = array('posts_per_page' => 6, 'paged' => 1, 'post_status' => 'publish' );
query_posts($args);
if (have_posts()) : ?>
<div class="blog-list dark">
	<div class="row">
		<div class="columns small-8">
			<ul class="inline-list archive">
				<li>Archives</li>

				<?php
				$currentYear = date("Y");
				$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts ORDER BY post_date DESC");
				$defaultYear = true;
				foreach($years as $year) : ?>
				<?php 
				$selectedClass = $defaultYear ? 'selected' : ''; 
				if ($defaultYear){
					$defaultYear = false;
					$currentYear = $year;
				}
				 ?>

				<li><a href="#" data-post-key="year" data-current-page="1" data-requested-year="<?php echo $year; ?>" class="blog-page <?php echo $selectedClass; ?>"><?php echo $year; ?></a></li>
				<?php endforeach; ?>
				
			</ul>
		</div>
		<div class="columns small-4">
			<ul class="inline-list arrows">
				<li><span class="blog-page disabled" data-requested-year="<?php echo $currentYear; ?>" data-current-page="1" data-post-key="previous"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 73.7 74.2" enable-background="new 0 0 73.7 74.2" xml:space="preserve"><g><path fill="#C0C0AF" d="M73.1 40.6H13.6L42 69l-5 5L0 37l37-37l5 5L13.6 33.5h59.5V40.6z"/></g></svg></span></li>
				<?php 
				$argsNext= array(
				'posts_per_page' => 6, 
				'paged' => 2,
				'year' => $currentYear,
				'post_status' => 'publish'
				);
				$postsNext = get_posts($argsNext);
				$nextCount = count($postsNext);
				$nextEnabled = $nextCount > 0;

				?>
				<?php if ($nextEnabled) : ?>
				<li><a href="#" class="blog-page" data-requested-year="<?php echo $currentYear; ?>" data-current-page="1" data-post-key="next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 73.7 74.2" enable-background="new 0 0 73.7 74.2" xml:space="preserve"><g><path fill="#C0C0AF" d="M73.3 37l-37 37l-5-5l28.4-28.4H0.3v-7.1h59.5L31.3 5.1l5-5L73.3 37z"/></g></svg></a></li>
				<?php else: ?>
				<li><span class="blog-page disabled" data-requested-year="<?php echo $currentYear; ?>" data-current-page="1" data-post-key="next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 73.7 74.2" enable-background="new 0 0 73.7 74.2" xml:space="preserve"><g><path fill="#C0C0AF" d="M73.3 37l-37 37l-5-5l28.4-28.4H0.3v-7.1h59.5L31.3 5.1l5-5L73.3 37z"/></g></svg></span></li>
				<?php endif; ?>
				
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="columns large-12">
			<ul class="large-block-grid-3 medium-block-grid-2 small-block-grid-1 list">
				<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
					<li>
					<date><?php echo get_the_date('n.j.Y'); ?></date>
					<h2><a href="<?php the_permalink(); ?>" data-reveal-id="blog-post" data-post-id="<?php the_ID(); ?>" ><?php the_title(); ?></a></h2>
					<?php remove_filter('the_excerpt', 'wpautop'); ?>
					<p class="small"><?php the_excerpt();  ?><span> </span><a href="<?php the_permalink(); ?>" data-reveal-id="blog-post" data-post-id="<?php the_ID(); ?>">Read More</a></p>
				</li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
<?php endif; ?>

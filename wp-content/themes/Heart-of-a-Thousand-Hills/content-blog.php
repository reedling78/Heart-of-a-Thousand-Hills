<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 12, 'paged' => $paged );
query_posts($args); ?>
<!-- the loop -->
<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
		<!-- rest of the loop -->
		<!-- the title, the content etc.. -->
		<h3><?php the_date('n.j.Y'); ?></h3>
		<h1><?php the_title(); ?></h1>
		<h2><?php the_excerpt();  ?></h2>
<?php endwhile; ?>
<?php next_posts_link(); ?>
<?php previous_posts_link(); ?>
<?php else : ?>
<?php endif; ?>



<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1>
					<?php 
						
					printf( __( '%s', 'alpha' ), get_the_date( _x( 'Y','alpha' ) ) );
					?>
				</h1>
			</header>
<!-- 
			<?php while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?> -->

			<?php alpha_paging_nav(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
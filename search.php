<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

	<div class="row">
		<div class="sixteen columns">
			<?php get_search_form(); ?>

			<h1><?php printf( __('Search Results for: %s', 'airship' ), '<span>' . get_search_query() . '</span>'); ?></h1>

			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php the_excerpt(''); ?>
				<?php wp_link_pages(); ?>
				
			<?php endwhile; endif; ?>

			<?php next_posts_link('&laquo; Older Entries') ?>
			<?php previous_posts_link('Newer Entries &raquo;') ?>
		</div>
	</div>

<?php get_footer(); ?> 
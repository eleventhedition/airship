<?php
/*
Template Name: Front Page
*/
?>

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

	<div class="row">
		<?php $temp_query = $wp_query; ?>
		<?php $parent = $post->ID; ?>
		<?php query_posts('posts_per_page=3&orderby=post_date&order=DESC'); while (have_posts()) : the_post(); ?>

		<?php if ( has_post_thumbnail() ) { ?>
		<div class="one-third column thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('small-thumb'); ?>
				<div class="details">
				  <h3><?php the_title(); ?></h3>
				  <p>Read more</p>
				</div>
			</a>
		</div>

		<?php } else { ?>

		<div class="one-third column standard-format">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink(); ?>">Read more</a></p>
		</div>

		<?php } ?>
		
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</div>

	<div class="row">
		<div class="sixteen columns">
			<div class="section remove-bottom">
				<div class="intro">
				  <h1><?php the_field('introduction_title'); ?></h1>
				  <?php the_field('introduction_paragraph'); ?>  
				</div>

				<div class="row">
					<div class="one-third column alpha">
					  <h2><?php the_field('column_one_title'); ?></h2>
					  <a href="<?php the_field('column_one_link'); ?>"><?php if( get_field('column_one_image') ) { $image = get_field('column_one_image'); ?><img src="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>" alt="<?php echo $image['alt']; ?>" /><?php } ?></a>
					  <?php the_field('column_one_copy'); ?>
					</div>

					<div class="one-third column">
					  <h2><?php the_field('column_two_title'); ?></h2>
					  <a href="<?php the_field('column_two_link'); ?>"><?php if( get_field('column_two_image') ) { $image = get_field('column_two_image'); ?><img src="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>" alt="<?php echo $image['alt']; ?>" /><?php } ?></a>
					  <?php the_field('column_two_copy'); ?>
					</div>

					<div class="one-third column omega">
					  <h2><?php the_field('column_three_title'); ?></h2>
					  <a href="<?php the_field('column_three_link'); ?>"><?php if( get_field('column_three_image') ) { $image = get_field('column_three_image'); ?><img src="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>" alt="<?php echo $image['alt']; ?>" /><?php } ?></a>
					  <?php the_field('column_three_copy'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="sixteen columns">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

			<?php the_content(''); ?>

		<?php endwhile; endif; ?>
		</div>
	</div>

<?php get_template_part( 'testimonials' ); ?>

<?php get_footer(); ?>
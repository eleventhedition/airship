<?php
/*
Template Name: Portfolio with 3 Columns
*/
?>

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

	<div class="row">
		<div class="sixteen columns">
			<ul id="menu-categories" class="sub-menu">
				<?php wp_list_categories('orderby=name&title_li='); ?>
			</ul>
		</div>

		<div class="sixteen columns">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php the_content(''); ?>
				<!-- <?php trackback_rdf(); ?> -->
			<?php endwhile; endif; ?>
		</div>

	<?php
	$myqueryname = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query('showposts=9'.'&paged='.$paged);
	?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

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
		
		<?php endwhile; endif; ?>

		<div class="sixteen columns center">
			<nav class="posts-navigation">
			    <ul>
			        <li class="newer"><?php previous_posts_link('Newer Posts'); ?></li>
			        <li class="older"><?php next_posts_link('Older Posts'); ?></li>
			    </ul>
			</nav>
		</div>

		<?php $wp_query = null; $wp_query = $myqueryname;?>
		<?php wp_reset_query(); ?>
	</div>

<?php get_template_part( 'testimonials' ); ?>

<?php get_footer(); ?>
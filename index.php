<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

	<div class="row">
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
	</div>

<?php get_footer(); ?>
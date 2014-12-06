<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

	<div class="row">
		<div class="sixteen columns">
			<?php if ( is_day() ) : ?>
				<h1 class="archive-title"><?php printf( __( 'Daily Archives: %s', 'airship' ), '<span>' . get_the_date() . '</span>' ); ?></h1>
			<?php elseif ( is_month() ) : ?>
				<h1 class="archive-title"><?php printf( __( 'Monthly Archives: %s', 'airship' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'airship' ) ) . '</span>' ); ?></h1>
			<?php elseif ( is_year() ) : ?>
				<h1 class="archive-title"><?php printf( __( 'Yearly Archives: %s', 'airship' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'airship' ) ) . '</span>' ); ?></h1>
			<?php elseif ( is_tag() ) : ?>
				<h1 class="archive-title"><?php printf( __( 'Posts Tagged: %s', 'airship' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
			<?php elseif ( is_search() ) : ?>
				<h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'airship' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php endif; ?>

			<ul id="menu-categories" class="sub-menu">
				<?php wp_list_categories('orderby=name&title_li='); ?>
			</ul>
		</div>
	</div>

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

<?php get_footer() ?>
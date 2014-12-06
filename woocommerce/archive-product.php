<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

	<?php if ( have_posts() ) : ?>
	<?php woocommerce_product_loop_start(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<div class="one-third column product-post">
	  <a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('small-thumb',array('title' => "")); ?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<p><a href="<?php the_permalink(); ?>">View</a></p>
	  </a>
	</div>

	<?php endwhile; // end of the loop. ?>

	<?php woocommerce_product_loop_end(); ?>

	<?php
		/**
		 * woocommerce_after_shop_loop hook
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
	?>

	<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
	<?php wc_get_template( 'loop/no-products-found.php' ); ?>
	<?php endif; ?>

	<?php wp_reset_query(); ?>

<?php get_footer( 'shop' ); ?>
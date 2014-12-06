<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

	<?php
	$has_subpages = false;
	// Check to see if the current page has any subpages
	$children = wp_list_pages('&orderby=menu_order&child_of='.$post->ID.'&echo=0');
	if($children) {
	    $has_subpages = true;
	}
	// Reseting $children
	$children = "";

	if(is_page() && $post->post_parent) {
	    $children .= wp_list_pages("title_li=&orderby=menu_order&child_of=".$post->post_parent ."&echo=0&depth=1");
	} else if($has_subpages) {
	    $children .= wp_list_pages("title_li=&orderby=menu_order&child_of=".$post->ID ."&echo=0&depth=1");
	}
	?>
	<?php ?>
	<?php if ($children) { ?>
	<div class="row remove-bottom">
		<div class="sixteen columns">
			<ul class="sub-menu">
			    <?php echo $children; ?>
			</ul>
		</div>
	</div>
	<?php } ?>

	<div class="row">
		<div class="sixteen columns">
			<div class="section remove">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				
					<?php the_content(''); ?>
					<?php wp_link_pages(); ?>

					<!-- <?php trackback_rdf(); ?> -->
					
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>

	<?php if (!of_get_option('comment_area') ) {  ?>
	<div class="row">
		<div class="sixteen columns">
			<?php comments_template(); ?> 
		</div>
	</div>
	<?php } ?>

<?php get_footer(); ?>
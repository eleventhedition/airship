<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

	<?php while ( have_posts() ) : the_post(); ?>

	<div class="row">
		<div class="sixteen columns">
			<div class="section">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h1 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s', 'airship' ), esc_html( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><span class="meta-nav">&laquo; </span><?php echo get_the_title($post->post_parent) ?></a></h1>

					<h2 class="entry-title"><?php the_title(); ?></h2>

					<div class="entry-content">
					    <div class="entry-attachment">
							<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "medium"); ?>
		                        <p class="attachment"><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
		                        </p>
							<?php else : ?>
		                        <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
							<?php endif; ?>
					    </div>
					    
					    <div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
					 
						<?php the_content( __( 'Continue reading <span class="meta-nav">&amp;raquo;</span>', 'airship' )  ); ?>
						<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'airship' ) . '&amp;after=</div>') ?>
                    </div>

				</article><!-- #post-<?php the_ID(); ?> -->
			</div>
		</div>
	</div>

	<?php endwhile; ?>

<?php get_footer(); ?>
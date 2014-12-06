	<div class="row">
		<div class="sixteen columns">
			<div class="section half-bottom">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<p class="post-category"><?php the_category(', ') ?></p>

					<p class="date"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_date(); ?></a></p>

					<?php global $more; $more = 0; ?>
					<?php the_content( __( 'Continue reading <span class="meta-nav">&amp;raquo;</span>', 'airship' )  ); ?>
					<?php wp_link_pages(); ?>

					<!-- <?php trackback_rdf(); ?> -->

					<?php the_tags('<ul class="tags"><li>Tags:&nbsp;</li><li>','&#130;&nbsp;</li><li>','</li></ul>', 'airship'); ?>

				</article><!-- #post-<?php the_ID(); ?> -->
			</div>
		</div>
		<div class="sixteen columns">
			<div class="post-links">
		  		<div class="left"><?php previous_post_link(); ?></div>
				<div class="right"><?php next_post_link(); ?></div>
			</div>
		</div>	
	</div>
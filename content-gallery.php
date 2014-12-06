	<div class="row">
		<div class="six columns">
			<div class="section center">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<p class="post-category"><?php the_category(', ') ?></p>

					<p class="date"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_date(); ?></a></p>
					
					<?php global $more; $more = 0; ?>
					<?php the_content( __( 'Continue reading <span class="meta-nav">&amp;raquo;</span>', 'airship' )  ); ?>
					<?php wp_link_pages(); ?>

					<!-- <?php trackback_rdf(); ?> -->
		 			<?php if (!of_get_option('contact_button') ) { ?><a href="<?php the_field('button_link'); ?>" class="button">Contact Us</a><?php } ?>
				</article><!-- #post-<?php the_ID(); ?> -->
			</div>
		</div>
		<div class="nine columns offset-by-one">
			<div class="section" id="project">
				<div id="carousel" class="flexslider">
					<ul class="slides">
						<?php if( have_rows('project_images') ): ?>
							<?php while( have_rows('project_images') ): the_row(); 
								$image = get_sub_field('project_image'); ?>
								<li>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['alt'] ?>" />
								</li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="sixteen columns">
			<hr />
			<?php the_tags('<ul class="tags twenty-bottom"><li>Tags:&nbsp;</li><li>','&#130;&nbsp;</li><li>','</li></ul>', 'airship'); ?>
			
			<div class="post-links">
		  		<div class="left"><?php previous_post_link(); ?></div>
				<div class="right"><?php next_post_link(); ?></div>
			</div>
		</div>		
	</div>
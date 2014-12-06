<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

	<?php if (!of_get_option('testimonials') ) {  ?>
	<div class="row">
		<div class="sixteen columns">
			<div class="center section" id="clients">
			  <h2><?php the_field('testimonial_title'); ?></h2>
			  <div class="quote">
			  	<?php the_field('testimonial_quote'); ?>
			  </div>
			  <p class="by"><?php the_field('testimonial_author'); ?></p>
			</div>
		</div>
	</div>
	<?php } ?>
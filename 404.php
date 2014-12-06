<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

	<div class="row">
		<div class="sixteen columns">
			<div class="section">
				<h1 class="entry-title"><?php _e( 'Page Not Found', 'airship' ); ?></h1>
                <div class="entry-content">
					<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'airship' ); ?></p>
                </div>
			</div>
			<div class="section remove-bottom">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
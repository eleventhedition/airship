<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

	<div class="row">
		<div class="sixteen columns">
			<?php /* Widgetized sidebar */
	    		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('airship_footer') ) : ?>
	    	<?php endif; ?>

			<div id="social" class="section center"><hr />
				<?php $facebook = of_get_option('facebook'); if ($facebook) { ?>    
			    <a href="<?php echo of_get_option('facebook'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.svg" alt="Facebook"></a>
			    <?php } ?>
				<?php $twitter = of_get_option('twitter'); if ($twitter) { ?>    
			    <a href="<?php echo of_get_option('twitter'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.svg" alt="Twitter"></a>
			    <?php } ?>
				<?php $gp = of_get_option('gp'); if ($gp) { ?>    
			    <a href="<?php echo of_get_option('gp'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googleplus.svg" alt="Google Plus"></a>
			    <?php } ?>
				<?php $instagram = of_get_option('instagram'); if ($instagram) { ?>    
			    <a href="<?php echo of_get_option('instagram'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/instagram.svg" alt="Instagram"></a>
			    <?php } ?>
				<?php $youtube = of_get_option('youtube'); if ($youtube) { ?>    
			    <a href="<?php echo of_get_option('youtube'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.svg" alt="You Tube"></a>
			    <?php } ?>
			    <?php $tweets = of_get_option('tweets'); if ($tweets) { ?>
				<a href="https://twitter.com/<?php echo of_get_option('tweets'); ?>" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @<?php echo of_get_option('tweets'); ?></a>
			    <?php } ?>
			</div>
		</div>
	</div>

	<footer role="contentinfo" class="sixteen columns">
		<div class="section" id="footer">
			<p>&copy; <?php echo date('Y'); ?> <?php echo of_get_option('copyright'); ?> <?php if (!of_get_option('by_wordpress') ) {  ?>&nbsp;<?php do_action( 'wordpress_footer' ); ?><?php } ?></p>
			<a href="#top"><img src="<?php echo get_template_directory_uri(); ?>/images/nav/up.svg" alt="Back To Top" /></a>
		</div>
	</footer>
</div>	<!-- container --> 

<?php $analytics = of_get_option('analytics'); if ($analytics) { ?>    
<script type="text/javascript">
<?php echo of_get_option('analytics'); ?>
</script>    
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>
<?php
/*
Template Name: Contact
*/
?>

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!of_get_option('contact_form') ) {
	$this_form_spam = $_POST['title'];

	if ($this_form_spam == "")
	{
		if(isset($_POST['submitted'])) {
			$name = trim($_POST['contactName']);
			$email = trim($_POST['email']);
			$comments = trim($_POST['comments']);

			$emailTo = get_option('tz_email');
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = 'Website Enquiry';
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
	}
}
?>

<?php get_header(); ?>

	<div class="row">
		<div class="sixteen columns">
			<div class="section half-bottom">
				<?php the_title( '<h1>', '</h1>' ); ?>
			</div>
		</div>
	</div>

	<?php if (!of_get_option('contact_form') ) {  ?>
	<div class="row">
		<div class="ten columns">
			<div class="section remove-top">
				<?php if(isset($emailSent) && $emailSent == true) { ?>
					<div class="thanks">
						<p>Thanks, we will get in touch shortly.</p>
					</div>
				<?php } else { ?>
					<?php if(isset($hasError) || isset($captchaError)) { ?>
						<p class="error">Sorry, an error occured.<p>
				<?php } ?>
				<?php } ?>
				<form action="<?php echo home_url(); ?>/contact" id="contactForm" class="custom-form" method="post">
					<div>
					  <input type="text" id="title" name="title" value="" />
					  <label for="contactName">Name</label>
					  <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required" />
					</div>
					<div>
					  <label for="email">Email</label>
					  <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required email" />
					</div>
					<div>
					<label for="commentsText">Message:</label>
					<textarea name="comments" id="commentsText"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
					</div>
					
					<button type="submit"><span>Send</span></button>
		      		<input type="hidden" name="submitted" id="submitted" value="true" />
				</form>
			</div>
		</div>

		<div class="five columns offset-by-one">
			<div class="section remove-top">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

					<?php the_content(''); ?>
					
				<?php endwhile; endif; ?>	
			</div>
		</div>
	</div>

    <?php } else { ?>

	<div class="row">
		<div class="sixteen columns">
			<div class="section remove-top">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

					<?php the_content(''); ?>

				<?php endwhile; endif; ?>	
			</div>
		</div>
	<div>

	<?php } ?>

<?php get_template_part( 'testimonials' ); ?>

<?php get_footer(); ?>
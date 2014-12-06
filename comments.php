<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php if(post_password_required()) : ?>
	<a name="comments"></a>
	<div id="comments">
		<p><?php _e('Password Required', 'airship') ?></p>
	</div>
	<?php return; ?>
<?php endif; ?>

<?php if(have_comments() || comments_open()) : ?>
	<a id="comments"></a>
	<div id="comments" class="section">
		<?php if(have_comments()) : ?>
			<h3 class="comments-title">
				<?php
				printf(
					_n('One Comment', '%1$s Comments', get_comments_number(), 'airship'),
					number_format_i18n(get_comments_number()),
					'<em>' . get_the_title() . '</em>'
				);
				?>
			</h3>
		
			<?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
				<div class="navigation">
					<div
						class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'airship')); ?></div>
					<div
						class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'airship')); ?></div>
				</div>
			<?php endif; ?>
		
			<ol class="commentlist">
				<?php
				// List comments
				wp_list_comments(array(
					'callback' => 'airship_comment'
				));
				?>
			</ol>
		<?php endif; ?>
	
		<?php
		// Display the comment form
		$commenter = wp_get_current_commenter();
		comment_form(array(
			'fields' => array(
				'author' => sprintf('<input name="author" type="text" placeholder="%s" value="' . esc_attr( $commenter['comment_author'] ) . '" />', __('Name', 'airship')),
				'email' => sprintf('<input name="email" type="text" placeholder="%s" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" />', __('Email', 'airship')),
				'url' => sprintf('<input name="url" type="text" placeholder="%s" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />', __('Website', 'airship')),
			),
			'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="required"></textarea>',
		));
		?>
	</div>
<?php endif; ?>

<?php if(!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
	<div id="comments" class="comments-disabled content">
		<p><?php _e('Comments are Disabled', 'airship') ?></p>
	</div>
<?php endif; ?>
<?php if ( post_password_required() ) : ?>
	<p><?php esc_attr_e( 'This post is password protected. Enter the password to view any comments.', 'healthcare' ); ?></p>
<?php return;
endif; ?>
<?php if ( have_comments() ) : ?>
<div class="row comment">
	<div class="line"></div>
		<h3><i class="fa fa-comments"></i><?php echo comments_number(__('No Comments','healthcare'), __('1 Comment','healthcare'), '% Comments'); ?></h3>
		<?php wp_list_comments( array( 'callback' => 'health_care_comment' ) ); ?>		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php esc_attr_e( 'Comment navigation', 'healthcare' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'healthcare' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'healthcare' ) ); ?></div>
		</nav>
	<?php endif;  ?>
	</div>		
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<div class="row feedback">
		<?php $consent = '' ;
			$fields=array(
			'author' => '<div class="form-group col-md-4"><label  for="name">NAME:</label><input type="text" class="form-control" id="name" name="author" placeholder="Full Name"></div>',
			'email' => '<div class="form-group col-md-4"><label for="email">EMAIL:</label><input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address"></div>',
			'website' => '<div class="form-group col-md-4"><label  for="web">WEBSITE:</label><input type="text" class="form-control" id="web" placeholder="Website"></div>',
			'cookies' => '<div class="form-group animate col-sm-12 " data-anim-type="fadeInUpLarge" data-anim-delay="400">
                       <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
                           '<label for="wp-comment-cookies-consent">' . __( 'Save my name, email, and website in this browser for the next time I comment.','healthcare' ) . '</label>
                       </p>
                     </div>',
		);
		function my_fields($fields) { 
			return $fields;
		}
		add_filter('wl_comment_form_default_fields','my_fields');
			$defaults = array(
				'fields'=> apply_filters( 'wl_comment_form_default_fields', $fields ),
				'comment_field'=> '<div class="form-group col-md-12"><label  for="message">COMMENT:</label><textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Message"></textarea></div>',		
				'logged_in_as' => '<p class="logged-in-as">'. __( "Logged in as ",'healthcare' ).'<a href="'.admin_url( 'profile.php' ).'">'.$user_identity.'</a>'.'<a href="'. wp_logout_url( get_permalink() ).'" title="Log out of this account">'.__(" Log out?",'healthcare').'</a>' . '</p>', /* translators: %s: Reply to name */
				'title_reply_to' => __( 'Leave a Reply to %s','healthcare'),
				'class_submit' => 'btn',
				'label_submit'=>__( 'Post Comment','healthcare'),
				'comment_notes_before'=> '',
				'comment_notes_after'=>'',
				'title_reply'=> '<h2>'.__('Leave a Reply','healthcare').'</h2>',
				'role_form'=> 'form',
			);
		comment_form($defaults); ?>		
	</div>
<?php endif; // If registration required and not logged in ?>
<?php 
if ( ! function_exists( 'health_care_comment' ) ) :
function health_care_comment( $comment, $args, $depth ){
	//get theme data
	global $comment_data;
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] :__('Reply','healthcare'); ?>
	<div class="col-xs-12 border">
		<div class="col-xs-2 ">
		<?php echo get_avatar(get_the_author_meta( 'ID' ),$size = '80'); ?>
		</div>
		<div class="col-xs-11  col-xs-push-1">
			<h4><?php comment_author();?></h4>	
			<h5><?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>
			<?php comment_date('F j, Y');?>
			<?php else : ?>
			<?php comment_date(); ?>
			<?php endif; ?>
			<?php esc_attr_e('at','healthcare');?>&nbsp;<?php comment_time('g:i a'); ?></h5>
			<p><?php comment_text() ; ?></p>
			<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'healthcare' ); ?></em>
			<br/>
			<?php endif; ?>
		</div>
	</div>								
	<?php
}
endif;
?>
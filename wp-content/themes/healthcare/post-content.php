<div class="row post-area">
	<div <?php post_class();?>>
		<?php if(has_post_thumbnail()): ?>
			<div class="col-md-12 no-pad">
				<div class="img-thumbnail gallery">
					<?php $data= array('class' =>'img-responsive'); 
					the_post_thumbnail('healthcare-post-thumb', $data); ?>
					<div class="overlay">
						<div class="overlay-icon"><a rel="prettyPhoto[post]" href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>"><i class="fa fa-search"></i></a>
						<?php if(!is_page() && !is_single() ) { ?>
						<a href="<?php the_permalink(); ?>"><span class="fa fa-chain"></span></a>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
			<div class="col-md-12 border">
				<div class="line"></div>
				<?php if(is_single() || is_page()) { ?>
				<div class="post_title">
				<h3><?php the_title(); ?></h3>
				</div>
				<?php }else{ ?>
				<a class="post_title" href="<?php the_permalink(); ?>" ><h3><?php the_title(); ?> </h3></a><?php } ?>
				<div class="post-tags" ><?php the_tags(' <ul> Tags :<li>', '</li><li>', '</li></ul>'); ?>
				</div>
				<div class="post_meta">
					<div class="date1"><span class="fa fa-clock-o"> </span>
					     <?php echo get_the_date(); ?>    | <span class="fa fa-comment-o"></span> <?php echo comments_number(__('No Comments','healthcare'), __('1 Comment','healthcare'), '% Comments'); ?>
					
					</div>
				</div> 
				 <?php if(get_the_category_list() != '') { ?>
				<div class="category"><b><?php esc_html_e('Categories :','healthcare'); ?></b><?php the_category(' , '); ?></div>
				 <?php } ?>
					<div class="post_content">
					<?php if (is_single() || is_page()) { ?>
				<?php the_content(); }else{ the_excerpt();	}?>
				</div>
				<?php $defaults = array(
					'before'           => '<p>' . __( 'Pages:','healthcare' ),
					'after'            => '</p>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'separator'        => ' ',
					'nextpagelink'     => __( 'Next page','healthcare'),
					'previouspagelink' => __( 'Previous page','healthcare' ),
					'pagelink'         => '%',
					'echo'             => 1
					);
				wp_link_pages( $defaults );	?>
			</div>
	</div>
</div>
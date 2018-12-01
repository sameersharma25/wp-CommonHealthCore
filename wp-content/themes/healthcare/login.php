<?php
/**
 * Template Name: Login
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage healthcare
*/

if(!empty($_POST)){
	$error = 0;
	if(empty($_POST['email']) || empty($_POST['password']) ){
		$error = 1;
		$msg = 'The email and  password should not empty. Please try again';
	}else{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$authdata = authentication($email,$password);
		if($authdata){
			if(isset($authdata['status']) && $authdata['status'] == 'unauthorized' ){
				$error = 1;
				if(!empty($authdata['message'])){
                    $msg = $authdata['message'];
				}else{
					$msg = 'The email or password was incorrect. Please try again';
				}
				
			}else{
				$error = 2;
				
				$_SESSION['userdata'] = $authdata;
				wp_redirect( site_url()."/patients/", 301 );


			}

		}else{
			$error = 1;
		}
	}
}

get_header(); 
//get_template_part('cover');


?>
<div class="container-fluid space">
	<div class="container blogs">
	<div class="col-md-9 rightside">
	    <?php if($error == 1){ ?>
	    <div class="alert alert-danger alert-dismissible">
	        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> <?php echo $msg; ?>
        </div>
        <?php } ?>
		<div <?php post_class();?>>	
		<div class="row post-area">
	<div class="post-64 page type-page status-publish hentry">
					<div class="col-md-12 border">
				<div class="line"></div>
								<div class="post_title">
				<h3><?php the_title(); ?></h3>
				</div>
								<div class="post-tags">				</div>
				<!-- <div class="post_meta">
					<div class="date1"><span class="fa fa-clock-o"> </span>
					     November 21, 2018    | <span class="fa fa-comment-o"></span> No Comments					
					</div>
				</div>  -->
				 					<div class="post_content">
<?php if ( have_posts()): 
			while ( have_posts() ): the_post(); ?>
				<?php //get_template_part('post','content'); 
				the_content(); ?>
			<?php endwhile; 
			else:
				get_template_part('post','nocontent');
			endif; 
			 //comments_template( '', true );?>		
			<?php //health_care_navigation(); ?>
				</div>
							</div>
	</div>
</div>	
		</div>
	</div>
	<?php //get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
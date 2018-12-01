<?php
/**
 * Template Name: Create_referral
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


$error = 0;
/*if(isset($_SESSION['userdata'])){
	  $email = $_SESSION['userdata']['email'];
	  $patientdata = patientlist($email);
	  if(!empty($patientdata['status'] == 'ok')){
	  	 $patients = $patientdata['patients_details'];
	  }else{
	  	$error = 1;
	    $msg   = $patientdata['status']. ' ! '. $patientdata['message'];
	  }
}else{
	$error = 1;
	$msg   = 'unauthorized ! you have to login';
}*/
get_header(); get_template_part('cover');
?>
<div class="container-fluid space">
	<div class="container blogs">
	<div class="col-md-12 rightside">
	    <div class="post-73 page type-page status-publish hentry">	
			<div class="row post-area">
	            <div class="post-73 page type-page status-publish hentry">
					<div class="col-md-12 border">
				        <div class="line"></div>
							<div class="post_title"><h3>Create Referral</h3></div>
				            <div class="post-tags"></div>
				            <div class="post_content">
				                    <?php if($error == 0){ ?>
				 				    <form class="form-inline" action="">
				 				    <section><div><h4>Referral >> </h4></div></section>
									    <div class="row">
										    <div class="col-md-12">
										        <div class="col-md-6">
												  <div class="form-group">
												    <label for="email">Referral Name:</label>
												    <input type="text" class="form-control" id="email">
												  </div>
												</div>  
												<div class="col-md-6">
												  <div class="form-group">
												    <label for="pwd">Referral Resource:</label>
												    <input type="text" class="form-control" id="pwd">
												  </div>
												</div>
											
											 </div>
										</div>
		                                <br/>
										<div class="row">
										    <div class="col-md-12">
										        <div class="col-md-6">
												  <div class="form-group">
												    <label for="email">Urgency:</label>
												    <input type="text" class="form-control" id="email">
												  </div>
												</div>  
												<div class="col-md-6">
												  <div class="form-group">
												    <label for="pwd">Deadline:</label>
												    <input type="text" class="form-control" id="pwd">
												  </div>
												</div>
											
											 </div>
										</div>
										<section><div><h4>Task >> </h4></div></section>
										<div class="row">
										    <div class="col-md-12">
										        <div class="col-md-4">
												  <div class="form-group">
												    <label for="email">Task Type:</label>
												    <input type="text" class="form-control" id="email">
												  </div>
												</div>  
												<div class="col-md-4">
												  <div class="form-group">
												    <label for="pwd">Select Provider:</label>
												    <input type="text" class="form-control" id="pwd">
												  </div>
												</div>
												<div class="col-md-4">
												  <div class="form-group">
												    <label for="pwd">Appt. Date:</label>
												    <input type="text" class="form-control" id="pwd">
												  </div>
												</div>
											
											 </div>
										</div>
		                                <br/>
		                                <div class="row">
										    <div class="col-md-12">
										        <div class="col-md-4">
												  <div class="form-group">
												    <label for="email">Appt. Time:</label>
												    <input type="text" class="form-control" id="email">
												  </div>
												</div>  
												<div class="col-md-4">
												  <div class="form-group">
												    <label for="pwd">Deadline:</label>
												    <input type="text" class="form-control" id="pwd">
												  </div>
												</div>
												<div class="col-md-4">
												  <div class="form-group">
												    <label for="pwd">Status:</label>
												    <input type="text" class="form-control" id="pwd">
												  </div>
												</div>
											
											 </div>
										</div>

										<br/>
										<div class="row">
										    <div class="col-md-12">
										        
												  <div class="form-group">
												    <label for="email">Description:</label>
												    <textarea rows="5"></textarea>>
												  </div>
												</div>
										</div>

										<button type="submit" class="btn-primary">Create Referral</button>		
		                            </form>
						  			<?php }else{ ?>
									<div class="alert alert-danger alert-dismissible">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong><?php echo $msg; ?></strong> 
									</div>

									    
                                    <?php } ?>
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
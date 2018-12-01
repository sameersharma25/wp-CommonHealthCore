<style type="text/css">
.panel-heading .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
    float: right;        /* adjust as needed */
    color: grey;         /* adjust as needed */
}
.panel-heading .accordion-toggle.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
}
</style>
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

<?php
/**
 * Template Name: Patient_details
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
$success = 0;
if(isset($_SESSION['userdata'])){
	$email = $_SESSION['userdata']['email']; 
    $patient_id = base64_decode($_GET['pid']);
	if(!empty($_POST['submit'])){
       $dataArray = $_POST;
       $updateDeatils = updatePatientDetails($dataArray,$patient_id,$email);
       if($updateDeatils['status'] == 'ok'){
       	  $error = '0';
       	  $success = 21;
       	  $msg   = $updateDeatils['message'];
       }else{
       	  $error = 0;
       	  $success = 11;
       	  $msg   = 'we found error on update please try again !';
       }
	}
    
    //echo "<pre>";
    //print_r($_POST);
	if(!empty($_POST['vik-ref-post']) && ($_POST['vik-ref-post'] == 497)){
		 $success = 41;
		 $msg   = 'Referral Updated';
	}

    /* ------------ Referral List --------------------- */
    $referraldata = referralList($patient_id,$email);
    if(!empty($referraldata['status'] == 'ok')){
    	$referralList  = $referraldata['referral_list'];
    }
    /* -------------------------------------------------*/

    /* ------------ Communcation List --------------------- */
    $communcationdata = communicationList($patient_id,$email);
    if(!empty($communcationdata['status'] == 'ok')){
    	$commList  = $communcationdata['comm_data'];
    }
    /* -------------------------------------------------*/

    /*---------------Task List --------------------------*/
    if(!empty($referralList)){
       $referralid = $referralList[0]['referral_id'];
       $taskData = taskList($referralid,$email);
       if(!empty($taskData['status'] == 'ok')){
    	  $taskList  = $taskData['task_list'];
       }

    }
    
    /*--------------------------------------------------*/


    /* ------------ Patient Details --------------------- */
	$patientdata = patientDetails($patient_id,$email);
	if(!empty($patientdata['status'] == 'ok')){
	  	$patientsDeatils = $patientdata['patients_details'];
	}else{
	  	$error = 1;
	    $msg   = $patientdata['status']. ' ! '. $patientdata['message'];
	}

	/* -------------------------------------------------*/

	//echo "<pre>";
	//print_r($patientsDeatils);

	//echo $patientsDeatils['date_of_birth']; die; 
}else{
	$error = 1;
	$msg   = 'unauthorized ! you have to login';
}

//echo $error."_____"; die; 
get_header(); 
//get_template_part('cover');
?>
<!-- <div class="container-fluid space cover" style="background:linear-gradient(rgba(0, 0, 0, 0.70),rgba(0, 0, 0, 0.70) ),url() no-repeat fixed;">
	<div class="container">
		<h1 class="white">Whole Human</h1>
		<h4 class="white"><ul class="breadcrumb"><li><a href="https://dev11.resourcestack.com">Home</a></li> <li><a href="<?php echo site_url().'/patients'; ?>">Patients</a></li><li>Patients Details</li></ul></h4>
	</div>
</div> -->



<div class="container-fluid space">
	<div class="container blogs">
	<div class="col-md-12 rightside">
	    <div class="post-73 page type-page status-publish hentry">	
			<div class="row post-area">
	            <div class="post-73 page type-page status-publish hentry">
					<div class="col-md-12 border">
				        <div class="line"></div>
				        <?php if($error == 0){ ?>
							<div class="post_title"><h3><?php echo $patientsDeatils['first_name']." ".$patientsDeatils['last_name']; ?>
								

							</h3></div>
				            <div class="post-tags"></div>
				            <div class="post_content">
							  <div class="panel-group" id="accordion">
							  <div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							          Patient Details                                           
							        </a>
							      </h4>
							    </div>
    <div id="collapseOne" class="panel-collapse collapse <?php if(($success == '21') || ($success == '11')){ echo "in"; } ?>">
      <div class="panel-body">

        <?php if($success == '21'){ ?>
        <div class="row">
	    <div class="alert alert-success alert-dismissible">
	        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            <strong><?php echo $msg; ?></strong>
        </div>
        </div>
        <?php }elseif($success == '11'){ ?>
        <div class="row">
        <div class="alert alert-danger alert-dismissible">
	        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            <strong><?php echo $msg; ?></strong>
       </div>
        </div> 
        <?php }?>

	 <form class="form-inline" id="detailsform" method="post" action = "">
	    <div class="row">
		    <div class="col-md-12">
		        <div class="col-md-4">
				  <div class="form-group">
				    <label for="email">First Name:</label>
				    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo $patientsDeatils['first_name']; ?>" required>
				  </div>
				</div>  
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Last Name:</label>
				    <div class='input-group' >
				    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo $patientsDeatils['last_name']; ?>">
				    </div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Date of Birth:</label>
				    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="date_of_birth" class="form-control" id="dob"    placeholder="Date of Birth" value="<?php echo date('m/d/Y',strtotime($patientsDeatils['date_of_birth'])); ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				    
				  </div>
				</div>
			 </div>
		</div>
		<br/>
			<div class="row">
		    <div class="col-md-12">
		        <div class="col-md-4">
				  <div class="form-group">
				    <label for="email">Mobile:</label>
				    <input type="text" name="patient_phone" class="form-control" id="mobile" placeholder="Mobile" value="<?php echo $patientsDeatils['ph_number']; ?>">
				  </div>
				</div>  
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Email:</label>
				    <input type="email" name="patient_email" class="form-control" id="email" placeholder="Email" value="<?php echo $patientsDeatils['patient_email']; ?>" required>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Zip:</label>
				    <input type="text" name="patient_zipcode" class="form-control" id="zip" placeholder="Zip" value="<?php echo $patientsDeatils['patient_zipcode']; ?>">
				  </div>
				</div>
				
			 </div>
		</div>
		
<!-- 	<br/>	<div class="row">
		    <div class="col-md-12">
		        <div class="col-md-4">
				  <div class="form-group">
				    <label for="email">Address:</label>
				    <input type="text" name="patient_address" class="form-control" id="address" placeholder="Address" value="<?php echo $patientsDeatils['patient_address']; ?>">
				  </div>
				</div>  
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">City:</label>
				    <input type="text" class="form-control" id="city" placeholder="City" value="<?php echo ""; ?>">
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Office:</label>
				    <input type="text" class="form-control" id="office" placeholder="Office" value="">
				  </div>
				</div>
			 </div>
		</div> -->
		<br/>
		<div class="row">
		    <div class="col-md-12">
		        <div class="col-md-4">
				  <div class="form-group">
				    <label for="email">Insurance:</label>
				    <input type="text" name="healthcare_coverage" class="form-control" id="insurance" placeholder="Insurance" 
				    value="<?php echo $patientsDeatils['healthcare_coverage']; ?>">
				  </div>
				</div>  
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Policy Id:</label>
				    <input type="text" name="patient_coverage_id" class="form-control" id="policyid" placeholder="Policy Id" value="<?php echo $patientsDeatils['patient_coverage_id']; ?>">
				  </div>
				</div>
				<!-- <div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Group:</label>
				    <input type="text" class="form-control" id="pwd">
				  </div>
				</div> -->
			 </div>
		</div>
		<br/>
		<!-- <div class="row">
		    <div class="col-md-12">
		        <div class="col-md-4">
				  <div class="form-group">
				    <label for="email">Allergies:</label>
				    <input type="text" class="form-control" id="allergies" placeholder="Allergies" value="<?php echo ""; ?>">
				  </div>
				</div>  
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Complications:</label>
				    <input type="text" class="form-control" id="complications" placeholder="Complications" value="<?php echo ""; ?>" >
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Age:</label>
				    <input type="number"  class="form-control" id="age" min="0" placeholder="Age" value="<?php echo $patientsDeatils['age']; ?>">
				  </div>
				</div>
			 </div>
		</div>
		<br/> -->
		<div class="row">
		    <div class="col-md-12">
		        <div class="col-md-4">
				  <div class="form-group">
				    <label for="email">Perfered Contact:</label>
<label class="radio-inline"><input type="radio" name="mode_of_contact"  value="call" <?php if(isset($patientsDeatils['mode_of_contact']) && ($patientsDeatils['mode_of_contact'] == 'call')) { echo "checked"; } ?>>Call</label>
<label class="radio-inline"><input type="radio" name="mode_of_contact" value="text" <?php if(isset($patientsDeatils['mode_of_contact']) && ($patientsDeatils['mode_of_contact'] == 'text')) { echo "checked"; } ?>>Text</label>
<label class="radio-inline"><input type="radio" name="mode_of_contact" value="email" <?php if(isset($patientsDeatils['mode_of_contact']) && ($patientsDeatils['mode_of_contact'] == 'email')) { echo "checked"; } ?>>Email</label>
				  </div>
				</div>  
				<!-- <div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Transportation:</label>
				    
<label class="radio-inline"><input type="radio" name="yes" >Yes</label>
<label class="radio-inline"><input type="radio" name="no">No</label>
				  </div>
				</div> -->
				<!-- <div class="col-md-4">
				  <div class="form-group">
				    <label for="pwd">Gender:</label>
				    
<label class="radio-inline"><input type="radio" name="gender" value="male" <?php if(isset($patientsDeatils['gender']) && ($patientsDeatils['gender'] == 'male')) { echo "checked"; } ?>>Male</label>
<label class="radio-inline"><input type="radio" name="gender" value="female" <?php if(isset($patientsDeatils['gender']) && ($patientsDeatils['gender'] == 'female')) { echo "checked"; } ?>>Female</label>
				  </div>
				</div> -->
				
			 </div>
		</div>        
	   <input name="submit" type="submit" class="btn-primary" value="Update" > 
	  
	</form>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Referrals
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse <?php if($success == '41' ){ echo "in"; } ?>"">
      <div class="panel-body">
      <?php if($success == '41'){ ?>
        <div class="row">
	    <div class="alert alert-success alert-dismissible">
	        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            <strong><?php echo $msg; ?></strong>
        </div>
        </div>
        <?php } ?>
        <table class="table table-striped table-bordered" id="example-116">
                            <thead>
                                <tr>
                                    <th>&nbsp;&nbsp;</th>
                                    <th>Due Date</th>
                                    <th>Referral Name</th>
                                    <th>Referral Description</th>
                                    <th>Source</th>
                                    <th>Urgency</th>
                                    <th>Task Count</th>
                                <th class="tabledit-toolbar-column"></th></tr>
                            </thead>
                            <tbody id="refbody">
                                <?php
                                if(!empty($referralList)){
                                	$r = 1;
                                	foreach ($referralList as $refkey => $refvalue) { ?>
                                     
                                	<tr>
	                                	<td ><input type="radio" class="viewcheck" name="viewtask" id="<?php echo $refvalue['referral_id']; ?>" value="<?php echo $refvalue['referral_id']; ?>" <?php if(!empty($taskList) && ($refvalue['referral_id'] == $referralList['0']['referral_id'])){  echo "checked"; } ?> ></td>
	                                	<td id="duedate-<?php echo $refvalue['referral_id'];?>"><?php echo date('d-m-Y',strtotime($refvalue['due_date'])); ?></td>
	                                	<td id="refname-<?php echo $refvalue['referral_id'];?>"><?php echo $refvalue['referral_name']; ?></td>
	                                	<td id="refdesc-<?php echo $refvalue['referral_id'];?>"><?php echo $refvalue['referral_description']; ?></td>
	                                	<td id="source-<?php echo $refvalue['referral_id'];?>"><?php echo $refvalue['source']; ?></td>
	                                	<td id="urgency-<?php echo $refvalue['referral_id'];?>"><?php echo $refvalue['urgency']; ?></td>
	                                	<td><?php echo $refvalue['task_count']; ?></td>
	                                	<td><button class="btn-primary" data-toggle="modal"  data-target="#myModal" onclick="showReferral('<?php echo $refvalue['referral_id']; ?>')"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                                    </tr>
	                                <?php $r++; } }else{ ?>

	                                <tr>
	                                	<td colspan="8" style="color: red"><center><p>No Referral Added</p></center></td>
	                                </tr>

	                                <?php } ?>
                                
                                
                            </tbody>
                        </table>
            <a href="javascript:void(0)" >+ Add Referral</a>            

    <h4>Tasks</h4> 
    
     <table class="table table-striped table-bordered" id="example612Q">
                            <thead>
                                <tr>
                                    <th>Task Type</th>
                                    <th>Provider</th>
                                    <th>Owner</th>
                                    <th>Description</th>
                                    <th>Deadline</th>
                                    <th>Task Status</th>
                                    <th>&nbsp;&nbsp;</th>
                            </thead>
                            <tbody id="taskbody">
                                <?php if(!empty($taskList)){ 
                                	  foreach ($taskList as $taskkey => $taskvalue) { ?>		
                                <tr>
                                   <td><?php echo $taskvalue['task_type'];?></td>
                                   <td><?php echo $taskvalue['provider'];?></td>
                                   <td><?php echo $taskvalue['task_owner'];?></td>
                                   <td><?php echo $taskvalue['task_description'];?></td>
                                   <td><?php echo date('d-m-Y',strtotime($taskvalue['task_deadline']));?></td>
                                   <td><?php echo $taskvalue['task_status'];?></td>
                                   <td><button class="btn-primary" data-toggle="modal"  data-target="#myTaskModal" ><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                                   
                                </tr>
                                <?php } }else { ?>
                                <tr>
	                                <td colspan="7" style="color: red"><center><p>No Task Added</p></center></td>
	                            </tr>

	                            <?php } ?>
                                
                            </tbody>
                        </table> 

        <a href="javascript:void(0)" data-toggle="modal"  data-target="#myAddTaskModal" >+ Add Task</a> 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Notes
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <form method="POST">
        	
        	    <div class="row">
        		  <div class="col-md-12">
                   <textarea name="note" class="form-control" rows="7"  placeholder="write a notes....."></textarea>
        		  </div>
        		</div>
        		<br/>

        		<input name="submit12" type="button" class="btn-primary" value="Update" > 
        	
        </form>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          Communication
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <table class="table table-striped">
									<thead>
									    <tr>
									      <th scope="col">Task</th>
									      <th scope="col">Provider</th>
									      <th scope="col">&nbsp;&nbsp;</th>
									      <th scope="col">&nbsp;&nbsp;</th>
									     
									    </tr>
									</thead>
                                    <tbody>
                                       <tr>
									      <td>Appointment</td>
									      <td>Dentrix</td>
									      <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
									      <td><a href="" target="_blank">></a></td>
									      
									    </tr>
                                    </tbody>
                                    </table>
      </div>
    </div>
  </div>
</div>
  
  



									<?php }elseif($error == 1){ ?>
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

<div style="display: none">
  <form method="post" id="vikkkref">
  	<input type="text" name="vik-ref-post" value="497" />
  </form>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Referral</h4>
      </div>
      <div class="modal-body">
        <form id="referralform">
        	    
        	    <div class="row">
        		  <div class="col-md-6">
        		   <label>Due Date</label>
        		   <div class='input-group date' id='datetimepicker2'>
                    <input type="text" class="form-control" placeholder="Due Date" name="due_date" id="ref_due_date"  />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                   
        		  </div>
        		  <div class="col-md-6">
        		   <label>Referral Name</label>
                   <input type="text" class="form-control" placeholder="Referral Name" name="ref_name" id="ref_name" value=""/>
        		  </div>
        		</div>
        		<br/>
        		<div class="row">
        		  <div class="col-md-6">
        		   <label>Source</label>
                   <select name="ref_source" id="ref_source" class="form-control">
                   <option value="EHR">EHR</option>>
                   <option value="EDR">EDR</option>>
                   <option value="ExtCC">ExtCC</option>>
                   <option value="Internal">Internal</option>>
                   <option value="Self">Self</option>>
                   </select>

        		  </div>
        		  <div class="col-md-6">
        		   <label>Urgency</label>
                   <select name="urgency" id="ref_urgency" class="form-control">
                   <option value="High">High</option>>
                   <option value="Critical">Critical</option>>
                   <option value="Moderate">Moderate</option>>
                   <option value="Low">Low</option>>
                   </select>
        		  </div>
        		</div>
        		<br/>
        	    <div class="row">
        		  <div class="col-md-12">
        		   <label>Description</label>
                   <textarea name="description" id="ref_desc" class="form-control" rows="7"  placeholder="Description..."></textarea>
        		  </div>
        		</div>
        		<br/>
                <input type="hidden" class="form-control" placeholder="source" name="ref_id" id="ref_id" value=""/>
        		<input name="ref-update" onclick="updatereferal()" type="button" class="btn-primary" value="Update" > 
        	
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- myTaskModal-->
<div id="myTaskModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Task</h4>
      </div>
      <div class="modal-body">
        <form id="referralform">
        	    
        	    <div class="row">
        		  <div class="col-md-6">
        		   <label>Deadline</label>
        		   <div class='input-group date' id='datetimepicker21'>
                    <input type="text" class="form-control" placeholder="Deadline" name="due_date" id="task_deadline"  />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                   
        		  </div>
        		  <div class="col-md-6">
        		   <label>Task Type</label>
                   <input type="text" class="form-control" placeholder="Task Type" name="ref_name" id="task_type" value=""/>
        		  </div>
        		</div>
        		<br/>
        		<div class="row">
        		  <div class="col-md-6">
        		   <label>Provider</label>
                   <input type="text" class="form-control" placeholder="Provider" name="ref_name" id="task_provider" value=""/>

        		  </div>
        		  <div class="col-md-6">
        		   <label>Owner</label>
                   <input type="text" class="form-control" placeholder="Owner" name="ref_name" id="task_owner" value=""/>
        		  </div>
        		</div>
        		<br/>
        		<div class="row">
        		  <div class="col-md-6">
        		   <label>Status</label>
                   <input type="text" class="form-control" placeholder="Status" name="ref_name" id="task_status" value=""/>

        		  </div>
        		 <!--  <div class="col-md-6">
        		   <label>Owner</label>
                   <input type="text" class="form-control" placeholder="Provider" name="ref_name" id="task_owner" value=""/>
        		  </div> -->
        		</div>
        		<br/>

        	    <div class="row">
        		  <div class="col-md-12">
        		   <label>Description</label>
                   <textarea name="description" id="task_desc" class="form-control" rows="7"  placeholder="Description..."></textarea>
        		  </div>
        		</div>
        		<br/>
                <input type="hidden" class="form-control" placeholder="source" name="ref_id" id="ref_id" value=""/>
        		<input name="ref-update"  type="button" class="btn-primary" value="Update" > 
        	
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myAddTaskModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Task</h4>
      </div>
      <div class="modal-body">
        <form id="referralform">
        	    
        	    <div class="row">
        		  <div class="col-md-6">
        		   <label>Deadline</label>
        		   <div class='input-group date' id='datetimepicker22'>
                    <input type="text" class="form-control" placeholder="Deadline" name="due_date" id="task_deadline"  />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                   
        		  </div>
        		  <div class="col-md-6">
        		   <label>Task Type</label>
                   <input type="text" class="form-control" placeholder="Task Type" name="ref_name" id="task_type" value=""/>
        		  </div>
        		</div>
        		<br/>
        		<div class="row">
        		  <div class="col-md-6">
        		   <label>Provider</label>
                   <input type="text" class="form-control" placeholder="Provider" name="ref_name" id="task_provider" value=""/>

        		  </div>
        		  <div class="col-md-6">
        		   <label>Owner</label>
                   <input type="text" class="form-control" placeholder="Owner" name="ref_name" id="task_owner" value=""/>
        		  </div>
        		</div>
        		<br/>
        		<div class="row">
        		  <div class="col-md-6">
        		   <label>Status</label>
                   <input type="text" class="form-control" placeholder="Status" name="ref_name" id="task_status" value=""/>

        		  </div>
        		 <!--  <div class="col-md-6">
        		   <label>Owner</label>
                   <input type="text" class="form-control" placeholder="Provider" name="ref_name" id="task_owner" value=""/>
        		  </div> -->
        		</div>
        		<br/>

        	    <div class="row">
        		  <div class="col-md-12">
        		   <label>Description</label>
                   <textarea name="description" id="task_desc" class="form-control" rows="7"  placeholder="Description..."></textarea>
        		  </div>
        		</div>
        		<br/>
                <input type="hidden" class="form-control" placeholder="source" name="ref_id" id="ref_id" value=""/>
        		<input name="ref-update"  type="button" class="btn-primary" value="Save" > 
        	
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php get_footer(); ?>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<script>
/*jQuery(document).ready(function(){
        function updatePatientData(){
        	alert('hi');
         var formdata = jQuery('#detailsform').serialize() ;
         var action  = 'updatePatientDetails';
         var actionurl = "<?php echo site_url().'api.php'; ?>";
         e.preventDefault();
          jQuery.ajax({
            type: 'post',
            url: actionurl,
            data: {postdata:formdata,funtion:action}j,
            success: function () {
              alert('form was submitted');
            }
          });
        }
});*/
        
    </script>
    <script type="text/javascript">
            jQuery(function () {
                //jQuery('#datetimepicker1').datetimepicker();
                jQuery('#datetimepicker1').datetimepicker();
                jQuery('#datetimepicker2').datetimepicker();
                jQuery('#datetimepicker21').datetimepicker();
                jQuery('#datetimepicker22').datetimepicker();
            });


            jQuery(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });
    </script>
<script type="text/javascript">
var ajax_url = "<?php echo '/ajax.php'; ?>";

function updatereferal(){
	var formdata = jQuery('#referralform').serialize() ;
         var action  = 'updatePatientReferrals';
         var ref_id  = document.getElementById("ref_id").value;
         var ref_name  = document.getElementById("ref_name").value;
         var ref_due_date  = document.getElementById("ref_due_date").value;
         var ref_urgency  = document.getElementById("ref_urgency").value;
         var ref_source  = document.getElementById("ref_source").value;
         var ref_desc  = document.getElementById("ref_desc").value;
          jQuery.ajax({
            type: 'post',
            url: ajax_url,
            data: {ref_id:ref_id,ref_name:ref_name,ref_due_date:ref_due_date,ref_urgency:ref_urgency,ref_source:ref_source,ref_desc:ref_desc,funtion:action},
            success: function (res) {
            	//alert(res);
            	if(res == '11'){
            		//getRefList();
            		//var currentLocation = window.location;
            		//alert(currentLocation);
            		//alert('Referral Updated');
            		jQuery('#myModal').modal('hide');
            		//patireflist();
            		jQuery("#vikkkref").submit();
            		//window.location = currentLocation+'&ref=update';
            	}else{
            		alert('Error ! Please try again ');
            	}
              
            }
          });
}

function patireflist(){
	
       $("#vikkkref").submit();
    
}

function getRefList(){
	var patient_id = "<?php echo base64_decode($_GET['pid']); ?>";
	var email = "<?php echo $email; ?>";
        
    	jQuery.ajax({
			  url: ajax_url,
			  type:'POST',
			  cache: false,
			  data : {'patient_id':patient_id,'email':email,funtion:'patientsreferralList'},
			  success: function(html){
			  	//alert(html);
			  	//console.log(html);
			    jQuery("#refbody").html(html);
			  }
        });
        
}

function showReferral(refid){
    //alert('duedate-'+refid);
	
	document.getElementById("ref_id").value = refid;
	document.getElementById("ref_name").value = document.getElementById ( 'refname-'+refid ).textContent;
	document.getElementById("ref_due_date").value = document.getElementById ( 'duedate-'+refid ).textContent;

	document.getElementById("ref_urgency").value = document.getElementById ( 'urgency-'+refid ).textContent;
	document.getElementById("ref_source").value = document.getElementById ( 'source-'+refid ).textContent;

	document.getElementById("ref_desc").value = document.getElementById ( 'refdesc-'+refid ).textContent;

	//ref_source
    // alert(duedate);
    // alert(referralName);
     //alert(refname);
}


jQuery(".viewcheck").change(function() {
    if(this.checked) {
        var iid = jQuery(this).attr('id');
        var email = "<?php echo $email; ?>";
        if(iid){
        	jQuery.ajax({
				  url: ajax_url,
				  type:'POST',
				  cache: false,
				  data : {'referral_id':iid,'email':email,funtion:'referraltasks'},
				  success: function(html){
				  	//alert(html);
				  	//console.log(html);
				    jQuery("#taskbody").html(html);
				  }
            });
        }else{
        	alert('not iid');
        }
    }
});
	

jQuery('.show-form').on('click', function (event){
    event.preventDefault();
    var elem = jQuery(this); //writing $(this) every time is bad
    var target = jQuery('div[data-target="'+elem.attr("data-target")+'"]');

    if(elem.hasClass('active')){ 
        //remove from this
        elem.removeClass("active");
        //close box    
        target.slideUp("slow");
    } else { //toggle menu when clicking on some other link
        //remove from everywhere
        jQuery('.show-form').removeClass('active');
        //slide every box up
        jQuery('.collapse').slideUp("slow");
        //add to this only
        elem.addClass('active'); 
        //slide associated box down
        target.slideDown("slow");
    }
});

//editable: [[1, 'username'], [2, 'email'], [3, 'avatar', '{"1": "Black Widow", "2": "Captain America", "3": "Iron Man"}'],[4,'Urgency'],[5,'task_count']]






</script>
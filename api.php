<?php

function authentication($email,$password){
	   $post = [
	    'email' => $email,
	    'password' => $password
	   ];

	   $url = API_URL.'sessions'; 
	   //echo $url ; die; 
	   $curl_handle=curl_init();
	   curl_setopt($curl_handle,CURLOPT_URL,$url);
	   curl_setopt($curl_handle, CURLOPT_POST ,true);
	   curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $post);
	   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	   $buffer = curl_exec($curl_handle);
	   curl_close($curl_handle);
	   if (empty($buffer)){
	      print "Nothing returned from url.<p>";
	   }
	   else{
	  	  if(!empty($buffer)){
	  	  	$result = json_decode(json_encode(json_decode($buffer)), true);
	  	  	return $result;
	  	  }
	   }

}

function patientlist($email){ 
	   $userauth = $_SESSION['userdata']['authentication_token'];
	   $headers['Content-length'] = '0';
       $headers['Content-type'] = 'application/json';
	   $headers['Authorization'] = 'user-token: '.$userauth;   
	   $post = array('email'=>$email); 
	   $curl_handle=curl_init();
	   curl_setopt($curl_handle,CURLOPT_URL,API_URL.'patients_list');
	   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($curl_handle, CURLOPT_POST ,true);	  
	   curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $post);
	   curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
	   $buffer = curl_exec($curl_handle);
	   curl_close($curl_handle);
	   if (empty($buffer)){
	      print "Nothing returned from url.<p>";
	   }
	   else{
	  	  if(!empty($buffer)){
	  	  	$result = json_decode(json_encode(json_decode($buffer)), true);
	  	  	return $result;
	  	  }
	   }
}


function patientDetails($pid,$email){

	   $userauth = $_SESSION['userdata']['authentication_token'];
	   //$headers = array();
	   $headers['Content-length'] = '0';
       $headers['Content-type'] = 'application/json';
	   $headers['Authorization'] = 'user-token: '.$userauth;
       
	   $post = array('patient_id'=>$pid,'email'=>$email); 
	   $curl_handle=curl_init();
	   curl_setopt($curl_handle,CURLOPT_URL,API_URL.'patient_details');
	   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($curl_handle, CURLOPT_POST ,true);	  
	   curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $post);
	   curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
	   $buffer = curl_exec($curl_handle);
	   curl_close($curl_handle);
	   if (empty($buffer)){
	      print "Nothing returned from url.<p>";
	   }
	   else{
	  	  if(!empty($buffer)){
	  	  	$result = json_decode(json_encode(json_decode($buffer)), true);
            return $result;
	  	  }
	   }

}

function referralList($pid,$email){

	   $userauth = $_SESSION['userdata']['authentication_token'];
	   //$headers = array();
	   $headers['Content-length'] = '0';
       $headers['Content-type'] = 'application/json';
	   $headers['Authorization'] = 'user-token: '.$userauth;
       
	   $post = array('patient_id'=>$pid,'email'=>$email); 
	   $curl_handle=curl_init();
	   curl_setopt($curl_handle,CURLOPT_URL,API_URL.'rfl_list');
	   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($curl_handle, CURLOPT_POST ,true);	  
	   curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $post);
	   curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
	   $buffer = curl_exec($curl_handle);
	   curl_close($curl_handle);
	   if (empty($buffer)){
	      print "Nothing returned from url.<p>";
	   }
	   else{
	  	  if(!empty($buffer)){
	  	  	$result = json_decode(json_encode(json_decode($buffer)), true);
            return $result;
	  	  }
	   }

}

function communicationList($pid,$email){

	   $userauth = $_SESSION['userdata']['authentication_token'];
	   //$headers = array();
	   $headers['Content-length'] = '0';
       $headers['Content-type'] = 'application/json';
	   $headers['Authorization'] = 'user-token: '.$userauth;
       
	   $post = array('patient_id'=>$pid,'email'=>$email); 
	   $curl_handle=curl_init();
	   curl_setopt($curl_handle,CURLOPT_URL,API_URL.'msg_list');
	   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($curl_handle, CURLOPT_POST ,true);	  
	   curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $post);
	   curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
	   $buffer = curl_exec($curl_handle);
	   curl_close($curl_handle);
	   if (empty($buffer)){
	      print "Nothing returned from url.<p>";
	   }
	   else{
	  	  if(!empty($buffer)){
	  	  	$result = json_decode(json_encode(json_decode($buffer)), true);
	  	  	//echo "<pre>";
	  	  	//print_r($result); die; 
            return $result;
	  	  }
	   }

}

function taskList($refid,$email){
       
	   $userauth = $_SESSION['userdata']['authentication_token'];
	   //$headers = array();
	   $headers['Content-length'] = '0';
       $headers['Content-type'] = 'application/json';
	   $headers['Authorization'] = 'user-token: '.$userauth;
       
	   $post = array('referral_id'=>$refid,'email'=>$email); 
	   $curl_handle=curl_init();
	   curl_setopt($curl_handle,CURLOPT_URL,API_URL.'tsk_list');
	   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($curl_handle, CURLOPT_POST ,true);	  
	   curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $post);
	   curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
	   $buffer = curl_exec($curl_handle);
	   curl_close($curl_handle);
	   if (empty($buffer)){
	      print "Nothing returned from url.<p>";
	   }
	   else{
	  	  if(!empty($buffer)){
	  	  	$result = json_decode(json_encode(json_decode($buffer)), true);
            return $result;
	  	  }
	   }

}

function updatePatientDetails($detaildata,$patient_id,$email)
{
        
       $userauth = $_SESSION['userdata']['authentication_token'];
       $first_name = $detaildata['first_name'];
       $last_name  = $detaildata['last_name'];
       $dob        = date('Y-m-d',strtotime($detaildata['date_of_birth']));
       $gender     = $detaildata['gender'];
       $mobile     = $detaildata['patient_phone'];
       $contacttype = $detaildata['mode_of_contact'];
       $zipcode    = $detaildata['patient_zipcode'];
       $patientemail = $detaildata['patient_email'];
       $policyid = $detaildata['patient_coverage_id'];
       $healthcare_coverage = $detaildata['healthcare_coverage'];

       //echo $dob; 
       //echo "vikk"; die;

	   //$headers = array();
	   $headers['Content-length'] = '0';
       $headers['Content-type'] = 'application/json';
	   $headers['Authorization'] = 'user-token: '.$userauth;
       
	   $post = array('patient_id'=>$patient_id,'email'=>$email,'first_name'=>$first_name,'last_name'=>$last_name,'date_of_birth'=>$dob,'gender'=>$gender,'patient_phone'=>$mobile,'patient_email'=>$patientemail,'patient_zipcode'=>$zipcode,'healthcare_coverage'=>$healthcare_coverage,'patient_coverage_id'=>$policyid,'mode_of_contact'=>$contacttype); 
	   $curl_handle=curl_init();
	   curl_setopt($curl_handle,CURLOPT_URL,API_URL.'update_patient');
	   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($curl_handle, CURLOPT_POST ,true);	  
	   curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $post);
	   curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
	   $buffer = curl_exec($curl_handle);
	   curl_close($curl_handle);
	   if (empty($buffer)){
	      print "Nothing returned from url.<p>";
	   }
	   else{
	  	  if(!empty($buffer)){
	  	  	$result = json_decode(json_encode(json_decode($buffer)), true);
	  	  	return $result;
	  	  }
	   }
}


function updateReferral($referraldata,$referral_id,$email)
{
        
       $userauth      = $_SESSION['userdata']['authentication_token'];
       $referral_name = $referraldata['ref_name'];
       $due_date      = $referraldata['ref_due_date'];
       $urgency       = $referraldata['ref_urgency'];
       $source        = $referraldata['ref_source'];
       $referral_description     = $referraldata['ref_desc'];
       

	   //$headers = array();
	   $headers['Content-length'] = '0';
       $headers['Content-type'] = 'application/json';
	   $headers['Authorization'] = 'user-token: '.$userauth;
       
	   $post = array('referral_id'=>$referral_id,'email'=>$email,'referral_name'=>$referral_name,'due_date'=>$due_date,'urgency'=>$urgency,'source'=>$source,'referral_description'=>$referral_description); 
	   $curl_handle=curl_init();
	   curl_setopt($curl_handle,CURLOPT_URL,API_URL.'rfl_update');
	   curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($curl_handle, CURLOPT_POST ,true);	  
	   curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $post);
	   curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
	   $buffer = curl_exec($curl_handle);
	   curl_close($curl_handle);
	   if (empty($buffer)){
	      print "Nothing returned from url.<p>";
	   }
	   else{
	  	  if(!empty($buffer)){
	  	  	$result = json_decode(json_encode(json_decode($buffer)), true);
	  	  	return $result;
	  	  }
	   }
}





?>
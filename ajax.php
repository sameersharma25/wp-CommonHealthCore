<?php
session_start();
error_reporting(1);
//$filename =  __DIR__.'ajax.php';
require_once('wp-config.php'); 
require_once('api.php');
//

$function_name=$_POST['funtion'];

$res=call_user_func($function_name);
echo $res;


function referraltasks(){
	if(!empty($_POST)){
		
		$referral_id = $_POST['referral_id'];
		$email       = $_POST['email'];

		$tasks = taskList($referral_id,$email);
		if(!empty($tasks)) {
           if($tasks['status'] == 'ok'){
           	   $taskList  = $tasks['task_list'];

           }
		 
		}else{
			$taskList = array();
		}
        
		$taskHtml = taskHtmlTable($taskList);
		echo  $taskHtml;
	}


}

function taskHtmlTable($taskList)
{  
	
    //echo "cii";
	$html = "<table><tbody id='taskbody'>";
            if(!empty($taskList)){ 
                foreach ($taskList as $taskkey => $taskvalue) { 		
    $html.= "<tr><td>".$taskvalue['task_type']."</td>
                 <td>".$taskvalue['provider']."</td>
                 <td>".$taskvalue['task_owner']."</td>
                 <td>".$taskvalue['task_description']."</td>
                 <td>".date('d-m-Y',strtotime($taskvalue['task_deadline']))."</td>
                 <td>".$taskvalue['task_status']."</td>
                 <td><button class='btn-primary' data-toggle='modal'  data-target='#myTaskModal' ><i class='fa fa-pencil' aria-hidden='true'></i></button></td>

            </tr>";
            } }else { 

    $html.=  "<tr><td colspan='7' style='color: red'><center><p>No Task Added</p></center></td></tr>";                        
    } 
                                
    $html.= "</tbody></table>";
    return   $html;
}

function updatePatientReferrals(){
    $error = 0;
    if(!empty($_POST)){
        $referraldata = $_POST;
        $referral_id  = $_POST['ref_id'];
        $email   = $_SESSION['userdata']['email'];
        $update = updateReferral($referraldata,$referral_id,$email);
        if(!empty($update)){
            if($update['status'] == 'ok'){
                $error = '11';
            }else{
                $error = 1;
            }
        }else{
            $error = 3;
        }
    }else{

        $error = 2;
    }

    return $error;
}

function patientsreferralList(){
    if(!empty($_POST)){
        
        $patient_id = $_POST['patient_id'];
        $email       = $_POST['email'];

        $referrals = referralList($patient_id,$email);
        if(!empty($referrals)) {
           if($referrals['status'] == 'ok'){
               $referralList  = $referrals['referral_list'];

           }
         
        }else{
            $referralList = array();
        }

       // echo "<pre>";
       // print_r($referralList); die;
        
        $refHtml = referralHtmlTable($referralList);
        echo  $refHtml;
    }
}

function referralHtmlTable($referralList){
    $html = "<table><tbody id='refbody'>";
            if(!empty($referralList)){ 
                foreach ($referralList as $refkey => $refvalue) {         
    $html.= "<tr><td><input type='radio' class='viewcheck' name='viewtask' id='".$refvalue['referral_id']."' value='".$refvalue['referral_id']."' checked></td>
                 <td id='duedate-".$refvalue['referral_id']."'>".date('d-m-Y',strtotime($refvalue['due_date']))."</td>
                 <td id='refname-".$refvalue['referral_id']."'>".$refvalue['referral_name']."</td>
                 <td id='refdesc-".$refvalue['referral_id']."'>".$refvalue['referral_description']."</td>
                 <td id='source-".$refvalue['referral_id']."'>".$refvalue['source']."</td>
                 <td id='urgency-".$refvalue['referral_id']."'>".$refvalue['urgency']."</td>
                 <td>".$refvalue['task_count']."</td>
                 <td><button class='btn-primary' data-toggle='modal'  data-target='#myModal' onclick='showReferral('".$refvalue[referral_id]."')'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>

            </tr>";
            } }else { 

    $html.=  "<tr><td colspan='7' style='color: red'><center><p>No Referral Added</p></center></td></tr>";                        
    } 
                                
    $html.= "</tbody></table>";
    return   $html;
}






?>
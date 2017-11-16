<?php
/* 
Purpose : To change asset in front end.
Created : Nikitasa
Date : 03-07-2016
*/

//include smarty congig file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// include paging class 
include('classes/class.paging.php');
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');


if(!empty($_POST['submit'])){
      // Priority Field Validation
      if($fun->not_empty($_POST['message'])){
      	$smarty->assign('message' , $_POST['message']);
      }else{
      	$smarty->assign('messageErr' , 'Please enter the message');
      }
}

$app_users_id = '1'; 
$status = 'O';   	   		
// details created date and time 
$created_date = $fun->current_date($date);   
// Escapes special characters in a string for use in an SQL statement
$message = $mysql->real_escape_str($_POST['message']);
$type = $mysql->real_escape_str($_GET['type']);

if(!empty($_POST['message'])){	
      // query to insert into database. 
		$query = "CALL it_add_change_emp('".$message."','".$type."','".$created_date."','".$status."','".$app_users_id."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				$alert_msg1 = 'Oops! Problem in saving the data. Pls check the errors.';
				//throw new Exception('Problem in executing add brand page');
			}else{	
				// send mail to admin
				$sub = 'Change Asset Request Received From Ravi';
				$msg = $content->get_change_asset_mail($_POST);
				$mailer->send_mail($sub,$msg,'noreply','noreply@gmail.com','poonam','poonam@bigspire.com','','');	
				$alert_msg = 'Change asset request created and sent to admin successfully. ';	
			}
			// free the memory
			//$mysql->clear_result($result);
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}					
}		  		 
	
// calling mysql close db connection function
$c_c = $mysql->close_connection();
$smarty->assign('ALERT_MSG1' , $alert_msg1);
$smarty->assign('ALERT_MSG' , $alert_msg);
$smarty->assign('get_type' , $_GET['type']);
$smarty->display('fr_asset_change_user.tpl');
?>
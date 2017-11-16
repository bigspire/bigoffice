<?php
/* 
Purpose : To edit change asset info.
Created : Gayathri
Date : 22-06-2016
*/
// starting the session
session_start();
// including smarty config
include 'configs/smartyconfig.php';
// including Database class file
include('classes/class.mysql.php');
$mysql->connect_database();
// Validating fields using class.function.php
include('classes/class.function.php');
//include menu_count file
include 'include/menu_count.php';
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}
// get database values
$query = "call it_get_change_asset('$getid')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get change asset');
	}
	$row = $mysql->display_result($result);
	// assign row as rows for sending mail
	$rows = $row;
	$smarty->assign('rows',$row);
	// assign the db values into session
	foreach($row as $key => $record){
		$smarty->assign($key,$record);		
	}   			
	$row['type'] = $fun->it_brand_type($row['type']);
	$smarty->assign('type',$row['type']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if(!empty($_POST)){
	// Validating the required fields  
		if(empty($_POST['status'])){
			$statusErr = 'Please select the Status';
			$test = 'error';
			$smarty->assign('statusErr',$statusErr);
		}else{
			$smarty->assign('status',$_POST['status']);	
		}

	// assigning the date
	$modified_dat = $fun->current_date();
	
	if(empty($test)){
		// query to insert into database. 
		$query = "CALL it_edit_change_asset('".$mysql->real_escape_str($getid)."', 
		'".$mysql->real_escape_str($_POST['status'])."','".$modified_dat."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){ 
				throw new Exception('Problem in executing edit change asset');
			}
			$row = $mysql->display_result($result);
			$affected_rows = $row['affected_rows'];
			
			// send mail to admin
			$sub = 'Change Asset Request Updated';
			$msg = $content->get_change_asset_back_mail($_POST,$rows);
			$mailer->send_mail($sub,$msg,'noreply','noreply@gmail.com','pratik','pratik@bigspire.com','','');
				
			if(!empty($affected_rows)){
				// redirecting to view page
				header('Location: list_change_asset_info.php?status=updated');		
			}
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}

// smarty dropdown array for status
$smarty->assign('change_asset_status', array('' => 'Select', 'O' => 'Open', 'C' => 'Closed', 'N' => 'Not Closed', 
'H' => 'Hold'));
		
// clear the results	    			
//$mysql->clear_result($result);

$smarty->assign('login',$login);
// next query execution
//$mysql->next_query();
// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Edit Change Asset Info - IT');  
$smarty->assign('assign_asset_active','active'); 
$smarty->display('edit_change_asset_info.tpl');
?>
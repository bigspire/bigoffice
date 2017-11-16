<?php
/* 
Purpose : To Edit ticket.
Created : Nikitasa
Date : 17-06-2016
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
//include menu_count file
include 'include/menu_count.php';
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

$id = $_GET['id'];
$status_id = $_GET['status_id'];

// get database values
if(empty($_POST)){
// fetch all records
$query = "CALL it_view_ticket('$id')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing edit ticket page');
	}
   // calling mysql fetch_result function
   $obj = $mysql->display_result($result);
   $smarty->assign('priority', $fun->ticket_priority($obj['priority']));
	$smarty->assign('type', $obj['it_ticket_status_id']);
	// free the memory
	$mysql->clear_result($result);
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
}

$alert_msg = '';
if(!empty($_POST['Submit'])){
	// status field validation
   if(empty($_POST['it_ticket_status_id'])){
   	$alert_msg = 'Please select the status';
   } 
	$smarty->assign('type', $_POST['it_ticket_status_id']);
}
// when the form is submitted and no error msg.
if($alert_msg == '' && !empty($_POST['it_ticket_status_id'])){	
	$status_id = $mysql->real_escape_str($status_id);
    // write the query to update the ticket status is recent to 0
	$query = "CALL it_edit_ticket_status('".$status_id."')";
	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing ticket status page');
		}
		$created_date = $fun->current_date();
		$status = $mysql->real_escape_str($_POST['it_ticket_status_id']);
		$id = $mysql->real_escape_str($id);
		// call next query
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
	// write the query to update the ticket status is recent to 1
	$query = "CALL it_add_ticket_status_id('".$created_date."','".$id."','".$status."')";
	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing ticket status page');
		}
		if($_GET['id'] != ''  &&  $_GET['status_id'] != ''){
			// send mail to user
			$sub = 'Ticket Updated';
			$msg = $content->get_ticket_back_mail($_POST,$obj);
			$mailer->send_mail($sub,$msg,'noreply','noreply@gmail.com','pratik','pratik@bigspire.com','','');
			// redirect to list ticket page
			header('Location: list_ticket.php?='.'&status=updated');
    	}
    }catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
    }		       
}
// assign software status into array 
$status_type = array('' => 'Status', '1' => 'Open', '2' => 'Closed', '3' => 'Hold', '4' => 'Re-Open');

// to download files
if($_GET['action'] == 'download'){
	$path = 'uploads/ticket/'.$_GET['file'];
	$fun->download_file($path);
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

// assign smarty variables here
$smarty->assign('data', $obj);
$smarty->assign('status_type', $status_type);
$smarty->assign('g_id' , $_GET['id']);
$smarty->assign('error_msg', $alert_msg);
// assign page title
$smarty->assign('page_title' , 'Edit Ticket - IT');  
// assigning active class status to smarty menu.tpl
$smarty->assign('help_desk_active' , 'active'); 	  
// display smarty file
$smarty->display('edit_ticket.tpl');
?>
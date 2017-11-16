<?php
/* 
Purpose : To add scrap.
Created : Nikitasa
Date : 27-06-2016
*/

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

if(isset($_GET['id'])){
   // get record id   
	$id = $_GET['id'];
	if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  		header('Location:page_error.php');
	}
   // Escapes special characters in a string for use in an SQL statement
	$created_dat = $fun->current_date($date);
	$msg = '';
   $created_date = $mysql->real_escape_str($created_dat);
   $msg = $mysql->real_escape_str($msg);
	$id = $mysql->real_escape_str($id);
   // add hardware scrap
 	$query = "CALL it_add_scrap_hardware('".$created_date."','".$msg."','".$id."')";
	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing add hardware query');
		}
   	// free the memory
		$mysql->clear_result($result);
		// execute next query
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	$query = "call it_edit_scrap_hardware('".$id."')";
	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing edit scrap query');
		}
   	header('Location:list_hardware.php?page='.$_GET['page'].'&status=moved');
   	// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
// calling mysql close db connection function	
}
$c_c = $mysql->close_connection();
?>
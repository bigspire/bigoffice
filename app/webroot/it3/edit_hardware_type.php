<?php
/* 
Purpose : To edit the hardware type.
Created : Gayathri
Date : 17-06-2016
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

// get database values
$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}
if(empty($_POST)){
	$query = "CALL it_get_hardware_type_id('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get hardware type id');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values into session
		foreach($row as $key => $record){
			$smarty->assign($key,$record);		
		}   			
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
if(!empty($_POST)){
	// Validating the required fields  
	// array for printing correct field name in error message
	$fieldtype = array('0', '0', '1');
	$actualfield = array('title', 'ct code', 'status');
   $field = array('title' => 'titleErr', 'code' => 'codeErr', 'status' => 'statusErr');
	$j = 0;
	foreach ($field as $field => $er_var){ 
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$test = 'error';
			$smarty->assign($er_var,$er[$er_var]);
		}else{
			$smarty->assign($field,$_POST[$field]);	
		}
		$j++;
	}
	$smarty->assign('description',$_POST['description']);	
	// assigning the date
	$date = $fun->current_date();
	// query to check whether it is exist or not. 
	$query = "CALL it_check_hw_type_exist('".$getid."','".$_POST['title']."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing check hw type exist');
		}
		$row = $mysql->display_result($result);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	if(empty($test)){
		if($row['total'] == '0'){
			// query to insert into database. 
			$query = "CALL it_edit_hardware_type('".$mysql->real_escape_str($getid)."', '".$mysql->real_escape_str($_POST['title'])."', '".$mysql->real_escape_str($_POST['description'])."', 
			'".$mysql->real_escape_str($_POST['code'])."', '".$mysql->real_escape_str($_POST['status'])."', '".$date."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){ 
					throw new Exception('Problem in executing edit hardware type');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				if(!empty($affected_rows)){
					// redirecting to view page
					header('Location: hardware_type.php?status=updated');		
				}
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}	
		}else{
			$msg = "Hardware type title already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		}
	}
}
// smarty dropdown array for architechture
$smarty->assign('hw_status', array('' => 'Select', '1' => 'Active', '0' => 'Inactive'));

// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Edit Hardware Type - IT');  
$smarty->assign('settings_active','active'); 
$smarty->display('edit_hardware_type.tpl');
?>
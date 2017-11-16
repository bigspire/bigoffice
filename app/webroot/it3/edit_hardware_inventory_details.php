<?php
/* 
Purpose : To add the hardware details.
Created : Gayathri
Date : 15-06-2016
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

// get database values only when session has no values
$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}

// Selecting the record to edit
if(empty($_SESSION['h']['inventory_no']) && empty($_POST)){
	$query = "CALL it_get_hardware($getid,'ID')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get hardware');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values into session
		foreach($row as $key => $record){
			$_SESSION['h'][$key] = $record; 
		}
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

if(!empty($_POST)){
	// Validating the required fields  
	// array for printing correct field name in error message
	$fieldtype = array('0', '0', '1', '1');
	$actualfield = array('inventory no','asset description', 'location', 'location');
   $field = array('inventory_no' => 'inventory_noErr', 'asset_desc' => 'asset_descErr',
   'state_id' => 'stateErr', 'district_id' => 'stateErr');
	$j = 0;
	foreach ($field as $field => $er_var){
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$smarty->assign($er_var,$er[$er_var]);
			$test = 'error';
			$_SESSION['h'][$field] = '';
		}else{
			$_SESSION['h'][$field] = $_POST[$field]; 
			$smarty->assign($fields,$_SESSION[$fields]);	
		}
		$j++;
	}
	// redirection to next page
	if(empty($test)){
		$_SESSION['h']['edit_hardware_details'] = 'next';
		if($_POST['next_hdn'] == '1'){
			header('Location: edit_hardware_pricing_details.php?id='.$getid.'');	
		}else if($_POST['confirm_hdn'] == '1'){
			header('Location: edit_hardware_confirmation.php?id='.$getid.'');		
		}
	}
	if($_POST['previous_hdn'] == '1'){
		header('Location: edit_hardware_details.php?id='.$getid.'');		
	}
}
/* Should not come back once it reached list page.
if(empty($_SESSION)){
  header('Location:list_hardware.php');	
}*/
// smarty dropdown for State
$query = 'CALL it_get_state()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get state');
	}
	$states = array();
	while($state = $mysql->display_result($result)){
    	$states[$state['id']] = $state['state_name'];    		   
	}
	$smarty->assign('state',$states);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
if($_SESSION['h']['state_id'] != ''){	
	// smarty dropdown for District
	$query = "CALL it_get_district('".$_SESSION['h']['state_id']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get district');
		}
		$districts = array();
		while($district = $mysql->display_result($result)){
   		$districts[$district['id']] = $district['district_name'];    		   
		}
		$smarty->assign('district',$districts);
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Edit Hardware - IT');  
$smarty->assign('hardware_active','active'); 
$smarty->display('edit_hardware_inventory_details.tpl');
?>
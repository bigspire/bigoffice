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
// inclusing Database class file
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
/* Should not come back once it reached list page.
if(empty($_SESSION)){
  header('Location:list_hardware.php');	
}*/
// Selecting the record to edit
if(empty($_SESSION['h']) && empty($_POST)){
	$query = "CALL it_get_hardware($getid,'HD')";
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
		// Converting date format if it is '0000-00-00'
		if(($_SESSION['h']['validity_date'] == '0000-00-00')){
			$_SESSION['h']['validity_date'] = '';
		}
		// Date format conversion of valid till to display
		$date = $_SESSION['h']['validity_date'];
		$_SESSION['h']['validity_date'] = $fun->convert_date_display($date);

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
	$fieldtype = array('0', '0', '0', '1', '1');
	$actualfield = array('color', 'serial number', 'model id/name', 'type', 'brand', 
	'subscription validity');
   $field = array('color' => 'colorErr', 'serial_no' => 'serial_noErr', 'model_id' => 'model_idErr', 
   'hardware_type_id' => 'hardware_type_idErr', 
   'it_brand_id' => 'it_brand_idErr', 'validity_year' => 'validity_yearErr');
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
	$_SESSION['h']['description'] = $_POST['description'];
	$smarty->assign('description',$_SESSION['description']);
	$_SESSION['h']['validity_date'] = $_POST['validity_date']; 
	$smarty->assign('validity_date',$_SESSION['validity_date']);
	// redirection to next page
	if(empty($test)){
		$_SESSION['h']['edit_hardware_details'] = 'next';
		header('Location: edit_hardware_inventory_details.php?id='.$getid.'');		
		if($_POST['next_hdn'] == '1'){
			header('Location: edit_hardware_inventory_details.php?id='.$getid.'');	
		}else if($_POST['confirm_hdn'] == '1'){
			header('Location: edit_hardware_confirmation.php?id='.$getid.'');		
		}
	}
}
// smarty dropdown for Software type
$query = 'call it_get_hardware_type()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get hardware type');
	}
	$rows = array();
	while($row = $mysql->display_result($result)){
    	$rows[$row['id']] = $row['title'];    		   
	}
	$smarty->assign('row',$rows);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	
// smarty dropdown for Software brand
$query = "call it_get_brand('H')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get brand');
	}
	$brand = array();
	while($row = $mysql->display_result($result)){
    	$brand[$row['id']] = $row['title'];    		   
	}
	$smarty->assign('hw_brand',$brand);
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown array for Subscription validity
$smarty->assign('subscription_validity', array('' => 'Select', '0' => 'Life Time', '0.1' => '30 Days', '0.3' => '3 Months', 
'0.6' => '6 Months', '0.9' => '9 Months', '1' => '1 Year', '2' => '2 Years', '3' => '3 Years', '4' => '4 Years', 
'5' => '5 Years'));

// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Edit Hardware - IT'); 
$smarty->assign('hardware_active','active'); 
$smarty->display('edit_hardware_details.tpl');
?>
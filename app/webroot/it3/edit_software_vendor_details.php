<?php
/* 
Purpose : To edit the software vendor details.
Created : Gayathri
Date : 16-06-2016
*/
//starting the session
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

// Selecting the record to edit
$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}
// get database values only when session has no values
if(($_SESSION['s']['vendor_name'] == '') && empty($_POST)){
	$query = "CALL it_get_software($getid,'VD')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get software');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values into session
		foreach($row as $key => $record){
			$_SESSION['s'][$key] = $record; 
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
//print_r($_SESSION['s']);
if(!empty($_POST)){
	// Contact number size validation
	$contact_number = $_POST['vendor_phone'];
	if($fun->size_of_phonenumber($contact_number) == true){
		$contact_numberE = 'Please enter the correct size'; 
		$test = 'error';		
	}	
	// Contact number validation
	$contact_number = $_POST['vendor_phone'];
	if($fun->isnumeric($contact_number) == true){
		$contact_numberEr = 'Please enter the correct Contact Number'; 
		$test = 'error';		
	}
	// Validating the required fields  
	// array for printing correct field name in error message
   $actualfield = array('company name', 'contact number', 'city', 'contact person name', 'address');		

   $field = array('vendor_name' => 'company_nameErr', 'vendor_phone' => 'contact_numberErr', 
   'vendor_city' => 'cityErr', 'vendor_person' => 'contact_personErr', 'vendor_address' => 'addressErr');
	$j = 0;	
	$dbfield = array('vendor_name','vendor_phone','vendor_city','vendor_person','vendor_address');
	foreach ($field as $field => $er_var){ 		
		if($_POST[$field] == ''){
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please enter the '.$actual_field;
			$test = 'error';
			$_SESSION['s'][$field] = '';
			$smarty->assign($er_var,$er[$er_var]);
		}else{
			$_SESSION['s'][$field] = $_POST[$field] ? $_POST[$field] : $row[$dbfield[$j]]; 
			$smarty->assign($fields,$_SESSION[$fields]);	
		}
			$j++;	
	}	

	$field_var = array('contact_person', 'city', 'contact_number', 'contact_numberE', 'contact_numberEr');
	foreach ($field_var as $field_var){
		$smarty->assign($field_var,$$field_var);
	}
		// redirection to next page
	if(empty($test)){
		if($_POST['next_hdn'] == '1'){
			header('Location: edit_software_confirmation.php?id='.$getid.'');
		}else if($_POST['confirm_hdn'] == '1'){
			header('Location: edit_software_confirmation.php?id='.$getid.'');		
		}
	}
	if($_POST['previous_hdn'] == '1'){
		header('Location: edit_software_pricing_details.php?id='.$getid.'');		
	}
}
// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Edit Software - IT'); 
$smarty->assign('software_active','active');
$smarty->display('edit_software_vendor_details.tpl');
?>
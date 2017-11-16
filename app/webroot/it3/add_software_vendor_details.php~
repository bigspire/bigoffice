<?php
/* 
Purpose : To add the hardware details.
Created : Gayathri
Date : 07-06-2016
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

// Access next page only after finishing previous step.
if($_SESSION['s']['add_software_vendor_details'] != 'next'){
	header('Location:page_error.php');
}
if(!empty($_POST)){
	// Contact number size validation
	$contact_number = $_POST['contact_number'];
	if($fun->size_of_phonenumber($contact_number) == true){
		$contact_numberE = 'Please enter the correct size'; 
		$test = 'error';		
	}	
	// Contact number validation
	$contact_number = $_POST['contact_number'];
	if($fun->isnumeric($contact_number) == true){
		$contact_numberEr = 'Please enter the correct Contact Number'; 
		$test = 'error';		
	}	
	// Validating the required fields  
	// array for printing correct field name in error message
   $actualfield = array('company name', 'contact number', 'city', 'contact person name', 'address');		

   $field = array('company_name' => 'company_nameErr', 'contact_number' => 'contact_numberErr', 
   'city' => 'cityErr', 'contact_person' => 'contact_personErr', 'address' => 'addressErr');
	$j = 0;	
	foreach ($field as $field => $er_var){ 		
		if($_POST[$field] == ''){
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please enter the '.$actual_field;
			$test = 'error';
			$smarty->assign($er_var,$er[$er_var]);
			$_SESSION['s'][$field] = '';
		}else{
			$_SESSION['s'][$field] = $_POST[$field]; 
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
		$_SESSION['s']['add_software_confirmation'] = 'next';
		if($_POST['next_hdn'] == '1'){
			header('Location: add_software_confirmation.php');		
		}
	}
	if($_POST['previous_hdn'] == '1'){
		header('Location: add_software_pricing_details.php');		
	}
}
// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Add Software - IT'); 
$smarty->assign('software_active','active'); 
$smarty->display('add_software_vendor_details.tpl');
?>
<?php
/* 
Purpose : To add the hardware details.
Created : Gayathri
Date : 06-06-2016
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

if(!empty($_POST)){
	// Validating the required fields  
	// array for printing correct field name in error message
	$fieldtype = array('0', '0', '1', '1', '1', '1', '1', '1');
	$actualfield = array('edition', 'system requirements', 'type', 'subscription based ', 
	'no. of pc / license', 'brand', 'architecture', 'subscription validity');
   $field = array('edition' => 'editionErr',  'system_req' => 'system_reqErr', 'softwaretype' => 'softwaretypeErr', 'subscription_based' => 'subscription_basedErr',
   'license_no' => 'license_noErr', 'brand' => 'brandErr', 
   'architechture_no' => 'architechture_noErr',  'subscription_validity' => 'subscription_validityErr');
	$j = 0;
	foreach ($field as $field => $er_var){ 
		if($_POST[$field] == ''){ 
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$smarty->assign($er_var,$er[$er_var]);
			$test = 'error';
			$_SESSION['s'][$field] = '';
		}else{ 
			$_SESSION['s'][$field] = $_POST[$field]; 
			$smarty->assign($fields,$_SESSION[$fields]);
		}
			$j++;
	}
	// Skip the validity year validation id subscription based is 'No' 
	if($_SESSION['s']['subscription_based'] == '2'){
		$test = '';
		$_SESSION['s']['subscription_validity'] = '';
	}
	
	$_SESSION['s']['description'] = $_POST['description']; 	
	$smarty->assign('description',$_SESSION['description']);	
	$_SESSION['s']['valid_till'] = $_POST['valid_till']; 	
	$smarty->assign('valid_till',$_SESSION['valid_till']);	
	// redirection to next page
	if(empty($test)){
		$_SESSION['s']['add_software_pricing_details'] = 'next';
		if($_POST['next_hdn'] == '1'){
			header('Location: add_software_pricing_details.php');	
		}else if($_POST['confirm_hdn'] == '1'){
			header('Location: add_software_confirmation.php');	
		}
	}
}
// smarty dropdown for Software type
$query = 'call it_get_software_type()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get software type');
	}
	$rows = array();
	while($row = $mysql->display_result($result)){
    	$rows[$row['id']] = $row['title'];    		   
	}
	$smarty->assign('row',$rows);
	// free the memory
	$mysql->clear_result($result);
	// next query execution
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	
// smarty dropdown for Software brand
$query = "call it_get_brand('S')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get software brand');
	}
	$brand = array();
	while($row = $mysql->display_result($result)){
   	$brand[$row['id']] = $row['title'];    		   
	}
	$smarty->assign('sw_brand',$brand);
	// free the memory
	$mysql->clear_result($result);
	// next query execution
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown array for No. of PC / License
$license_no = array();
for($l = 1; $l <= 100; $l++){
	$license_no[$l] = $l;
}
$smarty->assign('license_nos', $license_no);

// smarty dropdown array for architechture
$smarty->assign('architechtures', array('' => 'Select', '1' => '32 bit', '2' => '64 bit', '3' => 'Both' ));

// smarty dropdown array for Subscription Based
$smarty->assign('subscription_based', array('' => 'Select', '1' => 'Yes', '2' => 'No'));

// smarty dropdown array for Subscription validity

$smarty->assign('subscription_validity', array('' => 'Select', '0' => 'Lifetime', '0.1' => '30 Days', '0.3' => '3 Months', 
'0.6' => '6 Months', '0.9' => '9 Months', '1' => '1 Year', '2' => '2 Years', '3' => '3 Years', '4' => '4 Years', 
'5' => '5 Years'));

// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Add Software - IT');  
$smarty->assign('software_active','active'); 
$smarty->display('add_software_details.tpl');
?>
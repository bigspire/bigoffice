<?php
/* 
Purpose : To edit the software details.
Created : Gayathri
Date : 10-06-2016
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
// Selecting the record to edit
if(empty($_SESSION['s']) && empty($_POST)){
	$query = "CALL it_get_software($getid,'SD')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get software');
		}
		if($result->num_rows){	
			$row = $mysql->display_result($result);
			$smarty->assign('rows',$row);
			// assign the db values into session
			foreach($row as $key => $record){
				$_SESSION['s'][$key] = $record; 
			}
			// Converting date format if it is '0000-00-00'
			if(($_SESSION['s']['validity_date'] == '0000-00-00')){
				$_SESSION['s']['validity_date'] = '';
			}
			// Date format conversion of valid till to display
			$date = $_SESSION['s']['validity_date'];
			$_SESSION['s']['validity_date'] = $fun->convert_date_display($date);
		}else{
			header('Location:page_error.php');
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

if(!empty($_POST)){
	// Validating the required fields  
	// array for printing correct field name in error message
	$fieldtype = array('0', '0', '1', '1', '1', '1', '1', '1');
	$actualfield = array('edition', 'system requirements', 'type', 'subscription based ', 
	'no. of pc / license', 'brand', 'architecture', 'subscription validity');
   $field = array('edition' => 'editionErr', 'system_req' => 'system_reqErr', 
   'software_type_id' => 'softwaretypeErr', 'subscription' => 'subscription_basedErr',
   'no_license' => 'license_noErr', 'it_brand_id' => 'brandErr', 
   'arch' => 'architechture_noErr',  'validity_year' => 'subscription_validityErr');
	$j = 0;
	$dbfield = array('edition', 'system_req', 'validity_date', 'software_type_id', 'subscription', 
	'no_license', 'it_brand_id', 'arch',  'validity_year');
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
	if($_SESSION['s']['subscription'] == '2'){
		$test = '';
		$_SESSION['s']['validity_year'] = '';
	}
	$_SESSION['s']['description'] = $_POST['description']; 
	$smarty->assign('description',$_SESSION['description']);
	$_SESSION['s']['validity_date'] = $_POST['validity_date']; 
	$smarty->assign('validity_date',$_SESSION['validity_date']);
	// redirection to next page
	if(empty($test)){
		if($_POST['next_hdn'] == '1'){
			header('Location: edit_software_pricing_details.php?id='.$getid.'');		
		}else if($_POST['confirm_hdn'] == '1'){
			header('Location: edit_software_confirmation.php?id='.$getid.'');		
		}
	}
}

// smarty dropdown for Software type
$query = "call it_get_software_type";
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
		throw new Exception('Problem in executing get brand');
	}
	$brand = array();
	while($row = $mysql->display_result($result)){
    	$brand[$row['id']] = $row['title'];    		   
	}
	$smarty->assign('softwarebrands',$brand);
	// free the memory
	$mysql->clear_result($result);
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
$smarty->assign('page_title' , 'Edit Software - IT'); 
$smarty->assign('software_active','active');
$smarty->display('edit_software_details.tpl');
?>
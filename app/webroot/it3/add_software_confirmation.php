<?php
/* 
Purpose : To add the software details.
Created : Gayathri
Date : 15-06-2016
*/

//starting the session
session_start();
// including smarty config file
include 'configs/smartyconfig.php';
// including Database class file
include('classes/class.mysql.php');
$mysql->connect_database();
// Validating fields using class.function.php
include('classes/class.function.php');
//include menu_count file
include 'include/menu_count.php';

// Access next page only after finishing previous step.
if($_SESSION['s']['add_software_confirmation'] != 'next'){
	header('Location:page_error.php');
}
// checking there is no empty fields before submit
if(!empty($_POST['next_hdn'])){
	// Date format conversion of valid till 
	if($_SESSION['s']['valid_till'] == ''){
		$valid_till = '0000-00-00';
	}else{
		$valid_till = $fun->convert_date($_SESSION['s']['valid_till']);
	}
	// if subscription based is 'No', date shouldn't insert 
	if($_SESSION['s']['subscription_based'] == '2'){
		$valid_till = '0000-00-00';
	}
	// Date format conversion of paid date 
	$paid_date = $fun->convert_date($_SESSION['s']['paid_date']);
	// assigning the date
	$date = $fun->current_date();
	if($_SESSION['s']['subscription_validity'] == ''){
		$_SESSION['s']['subscription_validity'] = '-1';
	}
	// query to insert into database. 
	$query = "CALL it_add_software_details('".$mysql->real_escape_str($_SESSION['s']['edition'])."', '".$mysql->real_escape_str($_SESSION['s']['architechture_no'])."', 
	'".$mysql->real_escape_str($_SESSION['s']['license_no'])."', '".$mysql->real_escape_str($paid_date)."', '".$mysql->real_escape_str($_SESSION['s']['subscription_based'])."', 
	'".$mysql->real_escape_str($_SESSION['s']['subscription_validity'])."', '".$mysql->real_escape_str($valid_till)."', '".$mysql->real_escape_str($_SESSION['s']['system_req'])."', 
	'".$mysql->real_escape_str($_SESSION['s']['description'])."', '".$mysql->real_escape_str($_SESSION['s']['amount'])."',
	'".$mysql->real_escape_str($_SESSION['s']['currency_type'])."', '".$mysql->real_escape_str($paid_date)."', 
	'".$mysql->real_escape_str($_SESSION['s']['paid_by'])."', '".$mysql->real_escape_str($_SESSION['s']['billfile'])."', '".$mysql->real_escape_str($_SESSION['s']['warfile'])."', 
	'".$mysql->real_escape_str($_SESSION['s']['company_name'])."', '".$mysql->real_escape_str($_SESSION['s']['contact_person'])."', '".$mysql->real_escape_str($_SESSION['s']['contact_number'])."', 
	'".$mysql->real_escape_str($_SESSION['s']['address'])."', '".$mysql->real_escape_str($_SESSION['s']['city'])."', '1' , '".$date."', 
	'".$mysql->real_escape_str($_SESSION['s']['softwaretype'])."', '".$mysql->real_escape_str($_SESSION['s']['brand'])."')";

	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$res = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing add software details');
		}
		$row = $mysql->display_result($res);
		$last_id = $row['inserted_id'];
		$uploaddir = 'uploads/software/'.$last_id.'_'; 
		if(!empty($last_id)){
			$upload_files = array($_SESSION['s']['billfile'], $_SESSION['s']['warfile']);
			foreach($upload_files as $uploadfiles){
				if(!empty($uploadfiles)){
					copy('uploads/temp/'.$uploadfiles, $uploaddir.$uploadfiles); 				
				}
			}
			if(!empty($_SESSION['s']['billfile']) || !empty($_SESSION['s']['warfile'])){
			if($_SESSION['s']['billfile'] == $_SESSION['s']['warfile']){
				unlink('uploads/temp/'.$_SESSION['s']['billfile']);
			}else{
				unlink('uploads/temp/'.$_SESSION['s']['billfile']);
				unlink('uploads/temp/'.$_SESSION['s']['warfile']);
			}
			}
			session_destroy();
			// redirecting to view page
			if($_POST['next_hdn'] == '1'){
				header('Location: list_software.php?status=created');		
			}else if($_POST['previous_hdn'] == '1'){
				header('Location: add_software_vendor_details.php');		
			}
		}
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}else{
	// subscription value to name conversion
	$subscription_based = array('1' => 'Yes', '2' => 'No');
	foreach ($subscription_based  as $subscription_based  => $subscriptionbased){ 
		if($_SESSION['s']['subscription_based'] == $subscription_based){
			$_SESSION['s']['subscriptionbased'] = $subscriptionbased; 
		}
	}
	// architecture value to name conversion
	$architechtures = array('1' => '32 bit', '2' => '64 bit', '3' => 'Both' );
	foreach ($architechtures  as $architechture_no  => $architechture){ 
		if($_SESSION['s']['architechture_no'] == $architechture_no){
			$_SESSION['s']['architechture'] = $architechture; 
		}
	}
	// paid modes value to name conversion	
	$paid_modes = array('CA' => 'Cash', 'CQ' => 'Cheque', 'OT' => 'Damand Draft');
	foreach ($paid_modes  as $paid_by  => $paid_mode){ 
		if($_SESSION['s']['paid_by'] == $paid_by){
		$_SESSION['s']['paidby'] = $paid_mode; 
		}
	}
	// paid modes value to name conversion	
	$currency_types = array('' => 'Select', 'R' => 'Rs', 'D' => '$');
	foreach ($currency_types as $currencytypes  => $currency_type){ 
		if($_SESSION['s']['currency_type'] == $currencytypes){
			$_SESSION['s']['currencytype'] = $currency_type; 
		}
	}
	// smarty name conversion for Software brand
	$softwaretype = $_SESSION['s']['softwaretype'];
	$query = "call it_get_swtype_byname('".$softwaretype."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get software type');
		}
		$row = $mysql->display_result($result);  		   
		$_SESSION['s']['software_type'] = $row['title']; 	
		$smarty->assign('software_type',$_SESSION['software_type']);
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}	

	// smarty name conversion for Software brand
	$brand = $_SESSION['s']['brand'];
	$query = "CALL it_get_brand_byname('".$brand."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get software brand');
		}
		$row = $mysql->display_result($result);
		$_SESSION['s']['brand_name'] = $row['title']; 
		$smarty->assign('brand_name',$_SESSION['brand_name']);
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
		die;
	}
	// validating year conversion
	$_SESSION['s']['validityyear'] = $fun->it_software_validity($_SESSION['s']['subscription_validity']);
	if($_SESSION['s']['subscription_validity'] == ''){
		$_SESSION['s']['validityyear'] = 'No';
	}
	// validating date conversion
	$valid_till = $fun->convert_date($_SESSION['s']['valid_till']);
	$_SESSION['s']['validitydate'] = $fun->it_software_created_date($valid_till);
	$paid_date = $fun->convert_date($_SESSION['s']['paid_date']);
	$_SESSION['s']['paiddate'] = $fun->it_software_created_date($paid_date);
	// session confirmation
	$_SESSION['s']['confirm'] = 'confirm';
	
	// to download files
	if($_GET['action'] == 'download'){
		$path = 'uploads/software/'.$_GET['file'];
		$fun->download_file($path);
	}	
}
// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Add Software - IT');
$smarty->assign('software_active','active'); 
$smarty->display('add_software_confirmation.tpl');
?>
<?php
/* 
Purpose : To add the hardware confirmation.
Created : Gayathri
Date : 15-06-2016
*/

//starting the session
session_start();
include 'configs/smartyconfig.php';

// including Database class file
include('classes/class.mysql.php');
$mysql->connect_database();

// Validating fields using class.function.php
include('classes/class.function.php');
//include menu_count file
include 'include/menu_count.php';
// Access next page only after finishing previous step.
if($_SESSION['h']['add_hardware_confirmation'] != 'next'){
	header('Location:page_error.php');
}
// checking there is no empty fields before submit
if(!empty($_POST['next_hdn'])){
	// Date format conversion of valid till 
	if($_SESSION['h']['valid_till'] == ''){
		$valid_till = '0000-00-00';
	}else{
		$valid_till = $fun->convert_date($_SESSION['h']['valid_till']);
	}
	// Date format conversion of paid date 
	$paid_date = $fun->convert_date( $_SESSION['h']['paid_date']);
		
	// assigning the date
	$date = $fun->current_date();

	// query to insert into database. 
	$query = "CALL it_add_hardware_details('".$mysql->real_escape_str($_SESSION['h']['model_id'])."', '".$mysql->real_escape_str($_SESSION['h']['color'])."', 
	'".$mysql->real_escape_str($_SESSION['h']['serial_no'])."', '".$mysql->real_escape_str($paid_date)."', '".$mysql->real_escape_str($_SESSION['h']['inventory_no'])."', 
	'".$mysql->real_escape_str($_SESSION['h']['asset_desc'])."',  
	'".$mysql->real_escape_str($_SESSION['h']['description'])."', '".$mysql->real_escape_str($_SESSION['h']['amount'])."',  
	'".$mysql->real_escape_str($_SESSION['h']['currency_type'])."', '".$mysql->real_escape_str($paid_date)."', 
	'".$mysql->real_escape_str($_SESSION['h']['paid_by'])."', '".$mysql->real_escape_str($_SESSION['h']['billfile'])."', '".$mysql->real_escape_str($_SESSION['h']['warfile'])."', 
	'".$mysql->real_escape_str($_SESSION['h']['subscription_validity'])."', '".$mysql->real_escape_str($valid_till)."', 
	'".$mysql->real_escape_str($_SESSION['h']['company_name'])."', '".$mysql->real_escape_str($_SESSION['h']['contact_person'])."', '".$mysql->real_escape_str($_SESSION['h']['contact_number'])."', 
	'".$mysql->real_escape_str($_SESSION['h']['address'])."', '".$mysql->real_escape_str($_SESSION['h']['city'])."', '1' , '".$date."', 
	'".$mysql->real_escape_str($_SESSION['h']['hardware_type_id'])."', '".$mysql->real_escape_str($_SESSION['h']['district'])."', '".$mysql->real_escape_str($_SESSION['h']['it_brand_id'])."')";

	try{
		// executing query
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing add hardware details');
		}
		$row = $mysql->display_result($result);
		$last_id = $row['inserted_id'];
		$uploaddir = 'uploads/hardware/'.$last_id.'_'; 
		if(!empty($last_id)){
			$upload_files = array($_SESSION['h']['billfile'], $_SESSION['h']['warfile']);
			foreach($upload_files as $uploadfiles){
				if(!empty($uploadfiles)){
					copy('uploads/temp/'.$uploadfiles, $uploaddir.$uploadfiles); 
				}
			}	
			if(!empty($_SESSION['h']['billfile']) || !empty($_SESSION['h']['warfile'])){
				if($_SESSION['h']['billfile'] == $_SESSION['h']['warfile']){
					unlink('uploads/temp/'.$_SESSION['h']['billfile']);
				}else{
					unlink('uploads/temp/'.$_SESSION['h']['billfile']);
					unlink('uploads/temp/'.$_SESSION['h']['warfile']);
				}
			}
			session_destroy();
			// redirecting to view page
			if($_POST['next_hdn'] == '1'){
				header('Location: list_hardware.php?status=created');			
			}else if($_POST['previous_hdn'] == '1'){
				header('Location: add_hardware_vendor_details.php');		
			}
		}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}else{
	// paid modes value to name conversion	
	$paid_modes = array('CA' => 'Cash', 'CQ' => 'Cheque', 'OT' => 'Damand Draft');
	foreach ($paid_modes  as $paid_by  => $paid_mode){ 
		if($_SESSION['h']['paid_by'] == $paid_by){
			$_SESSION['h']['paidby'] = $paid_mode; 
		}
	}
	// currency types value to name conversion	
	$currency_types = array('' => 'Select', 'R' => 'Rs', 'D' => '$');
	foreach ($currency_types as $currencytypes  => $currency_type){ 
		if($_SESSION['h']['currency_type'] == $currencytypes){
			$_SESSION['h']['currencytype'] = $currency_type; 
		}
	}
	// smarty name conversion for hardware type
	$hardwaretype = $_SESSION['h']['hardware_type_id'];
	$query = "call it_get_hw_byname('".$hardwaretype."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing get hardware type');
		} 
		$row = $mysql->display_result($result); 		   
		$_SESSION['h']['hardware_type'] = $row['title']; 		
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

	// smarty name conversion for hardware brand
	$brand = $_SESSION['h']['it_brand_id'];
	$query = "CALL it_get_brand_byname('".$brand."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing get hardware brand');
		}
		$row = $mysql->display_result($result);
		$_SESSION['h']['brand_name'] = $row['title']; 
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	// smarty dropdown for State
	$state_id = $_SESSION['h']['state'];
	$query = "call it_get_state_byname('".$state_id."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing get state');
		}
		$row = $mysql->display_result($result);
		$_SESSION['h']['state_name'] = $row['state_name']; 
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	// smarty name conversion for Software brand
	$district_id = $_SESSION['h']['district'];
	$query = "call it_get_dist_byname('".$district_id."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing get district');
		}
		$row = $mysql->display_result($result);
		$_SESSION['h']['district_name'] = $row['district_name']; 
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}  
	// validating year conversion
	$_SESSION['h']['validityyear'] = $fun->it_software_validity($_SESSION['h']['subscription_validity']);
	// validating date conversion
	$valid_till = $fun->convert_date($_SESSION['h']['valid_till']);
	$_SESSION['h']['validitydate'] = $fun->it_software_created_date($valid_till);
	$paid_date = $fun->convert_date( $_SESSION['h']['paid_date']);
	$_SESSION['h']['paiddate'] = $fun->it_software_created_date($paid_date);
	// session confirmation
	$_SESSION['h']['confirm_add'] = 'confirm';

	// to download files
	if($_GET['action'] == 'download'){
		$path = 'uploads/hardware/'.$_GET['file'];
		$fun->download_file($path);
	}	
}
// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Add Hardware - IT');
$smarty->assign('hardware_active','active'); 
$smarty->display('add_hardware_confirmation.tpl');
?>rr
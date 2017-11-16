<?php
/* 
Purpose : To edit assign asset.
Created : Gayathri
Date : 21-06-2016
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

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}
// get database values
if(empty($_POST)){
	$query = "CALL it_get_assign_asset('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get assign asset');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		if($row['type'] == 'S'){
			$get_sw = array('description' => $row['description'], 'app_users_id' => $row['app_users_id'], 'sw_type_id' => $row['type_id'], 
			'it_sw_brand_id' => $row['it_brand_id'], 'type' => $row['type'], 'edition_it_id' => $row['it_id'], 'status' => $row['status']);
			// assign the db values into session
			foreach($get_sw as $key => $record){
				$smarty->assign($key,$record);		
			} 	
		}
		if($row['type'] == 'H'){
			$get_sw = array('description' => $row['description'], 'app_users_id' => $row['app_users_id'], 'hw_type_id' => $row['type_id'], 
			'it_hw_brand_id' => $row['it_brand_id'], 'type' => $row['type'], 'inventory_it_id' => $row['it_id'], 'status' => $row['status']);
			// assign the db values into session
			foreach($get_sw as $key => $record){
				$smarty->assign($key,$record);		
			} 	
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
	// for passing Employee names
	$query = 'CALL it_get_employee()';
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing get employee');
		}
		while($nm = $mysql->display_result($result)){
   		if($nm['id'] == $_POST['app_users_id']){
				$empname = $nm['first_name'].' '.$nm['last_name']; 
			} 		   
		}
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	// Validating the required fields  
	// array for printing correct field name in error message
	if($_POST['type'] == 'S'){
		$fieldtype = array('1', '1', '1', '1', '1', '1');
		$actualfield = array('employee', 'software type', 'software brand', 'asset type', 'edition', 'status');
   	$field = array('app_users_id' => 'app_users_idErr', 'sw_type_id' => 'sw_type_idErr', 
   	'it_sw_brand_id' => 'it_sw_brand_idErr', 'type' => 'typeE', 'edition_it_id' => 'it_idErr', 'status' => 'statusErr');
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
		if(empty($test)){
			// query to insert into database. 
			$query = "CALL it_edit_assign_asset('".$mysql->real_escape_str($getid)."', '".$mysql->real_escape_str($_POST['type'])."',  
			'".$mysql->real_escape_str($_POST['status'])."','".$date."', 
			'".$mysql->real_escape_str($_POST['edition_it_id'])."', '".$mysql->real_escape_str($_POST['sw_type_id'])."', 
			'".$mysql->real_escape_str($_POST['it_sw_brand_id'])."', '".$mysql->real_escape_str($_POST['app_users_id'])."', 
			'".$mysql->real_escape_str($_POST['description'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){ 
					throw new Exception('Problem in executing edit assign asset');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				if(!empty($affected_rows)){
					// redirecting to view page
					header("Location: list_assign_asset.php?status=updated&asset_type=".$_POST['type']."&name=".$empname."");		
				}
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				die;
			}
		}
	}else if($_POST['type'] == 'H'){
		// Validating the required fields  
		// array for printing correct field name in error message
		$fieldtype = array('1', '1', '1', '1', '1', '1');
		$actualfield = array('employee', 'hardware type', 'hardware brand', 'asset type', 'inventory no', 'status');
  		$field = array('app_users_id' => 'app_users_idErr', 'hw_type_id' => 'hw_type_idErr', 
   	'it_hw_brand_id' => 'it_hw_brand_idErr', 'type' => 'typeE', 'inventory_it_id' => 'it_idErr', 'status' => 'statusErr');
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
		if(empty($test)){
			// query to insert into database. 
			$query = "CALL it_edit_assign_asset('".$mysql->real_escape_str($getid)."', '".$mysql->real_escape_str($_POST['type'])."',  
			'".$mysql->real_escape_str($_POST['status'])."','".$mysql->real_escape_str($date)."', 
			'".$mysql->real_escape_str($_POST['inventory_it_id'])."', '".$mysql->real_escape_str($_POST['hw_type_id'])."', 
			'".$mysql->real_escape_str($_POST['it_hw_brand_id'])."', '".$mysql->real_escape_str($_POST['app_users_id'])."', 
			'".$mysql->real_escape_str($_POST['description'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){ 
					throw new Exception('Problem in executing edit assign asset');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				if(!empty($affected_rows)){
					// redirecting to view page
					header("Location: list_assign_asset.php?status=updated&asset_type=".$_POST['type']."&name=".$empname."");		
				}
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			//die;
			}
		}
	}else{
		$asset_typeE = 'Please select the asset type';
		$smarty->assign('asset_typeE',$asset_typeE);
	}
}
// smarty dropdown array for status
$smarty->assign('assignasset_status', array('' => 'Select', '1' => 'Active', '0' => 'Inactive'));
// next query execution
//$mysql->next_query();

// smarty dropdown for hardware types
$query = 'CALL it_get_hardware_type()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get hardware type');
	}
	$hw_type = array();
	while($hw = $mysql->display_result($result)){
    	$hw_type[$hw['id']] = $hw['title'];    		   
	}
	$smarty->assign('hw_type',$hw_type);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown for software types
$query = 'CALL it_get_software_type()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get software type');
	}
	$sw_type = array();
	while($sw = $mysql->display_result($result)){
   	$sw_type[$sw['id']] = $sw['title'];    		   
	}
	$smarty->assign('sw_type',$sw_type);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown for Employee names
$query = 'CALL it_get_employee()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get employee');
	}
	$emp_name = array();
	while($name = $mysql->display_result($result)){
    	$emp_name[$name['id']] = $name['first_name'].' '.$name['last_name'];    		   
	}
	$smarty->assign('emp_name',$emp_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown for software brands.
$query = "CALL it_get_brand('S')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get brand');
	}
	$sw_brand = array();
	while($s_brand = $mysql->display_result($result)){
    	$sw_brand[$s_brand['id']] = $s_brand['title'];    		   
	}
	$smarty->assign('sw_brand',$sw_brand);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown for hardware brands.
$query = "CALL it_get_brand('H')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get brand');
	}
	$hw_brand = array();
	while($h_brand = $mysql->display_result($result)){
    	$hw_brand[$h_brand['id']] = $h_brand['title'];    		   
	}
	$smarty->assign('hw_brand',$hw_brand);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown for software edition.
$query = 'CALL it_get_asset_edition()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get asset edition');
	}
	$s_edition = array();
	while($sw_edition = $mysql->display_result($result)){
    	$s_edition[$sw_edition['id']] = $sw_edition['edition'];    		   
	}
	$smarty->assign('s_edition',$s_edition);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown for hardware inventory.
$query = 'CALL it_get_asset_inventory()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get asset inventory');
	}
	$h_inventory = array();
	while($hw_inventory = $mysql->display_result($result)){
    	$h_inventory[$hw_inventory['id']] = $hw_inventory['inventory_no'];    		   
	}
	$smarty->assign('h_inventory',$h_inventory);
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Edit Assign Asset - IT');  
$smarty->assign('assign_asset_active','active'); 
$smarty->display('edit_assign_asset.tpl');
?>
<?php
/* 
Purpose : To add assign asset.
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

if(!empty($_POST)){
	// for passing Employee names
	$query = 'CALL it_get_employee()';
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing get employee');
		}
		while($nm = $mysql->display_result($result)){
   		if($nm['id'] == $_POST['employee']){
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
	if($_POST['asset_type'] == 'S'){
		$fieldtype = array('1', '1', '1', '1', '1', '1');
		$actualfield = array('employee', 'software type', 'software brand', 'asset type', 'edition', 'status');
   	$field = array( 'employee' => 'employeeErr', 'swtype' => 'sw_typeErr', 
   	'swbrand' => 'sw_brandErr', 'asset_type' => '', 'edition' => 'editionErr', 'status' => 'statusErr');
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
			$query = "CALL it_add_assign_asset('".$mysql->real_escape_str($_POST['asset_type'])."', '".$date."', 
			'".$mysql->real_escape_str($_POST['edition'])."', '".$mysql->real_escape_str($_POST['status'])."', '".$mysql->real_escape_str($_POST['swtype'])."', 
			'".$mysql->real_escape_str($_POST['swbrand'])."', '".$mysql->real_escape_str($_POST['employee'])."', 
			'".$mysql->real_escape_str($_POST['description'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add assign asset');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
				if(!empty($last_id)){
					// redirecting to view page
					header("Location: list_assign_asset.php?status=created&asset_type=".$_POST['asset_type']."&name=".$empname."");		
				}
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
	}else if($_POST['asset_type'] == 'H'){
		// Validating the required fields  
		// array for printing correct field name in error message
		//if(isset($_POST['asset_type'])){
		$fieldtype = array('1', '1', '1', '1', '1','1');
		$actualfield = array('employee', 'hardware type', 'hardware brand', 'asset type', 'inventory no', 'status');
  		$field = array('employee' => 'employeeErr', 'hwtype' => 'hw_typeErr', 
   	'hwbrand' => 'hw_brandErr', 'asset_type' => '', 'inventory' => 'inventoryErr', 'status' => 'statusErr');
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
				$smarty->assign('description',$_POST['description']);	
			}
			$j++;
		}
		// assigning the date
		$date = $fun->current_date();

		if(empty($test)){
			// query to insert into database. 
			$query = "CALL it_add_assign_asset('".$mysql->real_escape_str($_POST['asset_type'])."', '".$mysql->real_escape_str($date)."', 
			'".$mysql->real_escape_str($_POST['status'])."', '".$mysql->real_escape_str($_POST['inventory'])."', '".$mysql->real_escape_str($_POST['hwtype'])."', 
			'".$mysql->real_escape_str($_POST['hwbrand'])."', '".$mysql->real_escape_str($_POST['employee'])."', 
			'".$mysql->real_escape_str($_POST['description'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add assign asset');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
				if(!empty($last_id)){
					// redirecting to view page
					header("Location: list_assign_asset.php?status=created&asset_type=".$_POST['asset_type']."&name=".$empname."");		
				}
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
	}else{
		$asset_typeE = 'Please select the asset type';
		$smarty->assign('asset_typeE',$asset_typeE);
	}
}else{
	$smarty->assign('asset_type', 'S');
}
// smarty dropdown array for status
$smarty->assign('assign_status', array('' => 'Select', '1' => 'Active', '0' => 'Inactive'));
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
		throw new Exception('Problem in executing get software brand');
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
		throw new Exception('Problem in executing get hardware brand');
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
$smarty->assign('page_title' , 'Add Assign Asset - IT');  
$smarty->assign('assign_asset_active','active'); 
$smarty->display('add_assign_asset.tpl');
?>
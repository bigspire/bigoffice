<?php
/* 
Purpose : To add the hardware pricing details.
Created : Gayathri
Date : 07-06-2016
*/
//starting the session
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

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}
// get database values only when session has no values
if(empty($_SESSION['h']['amount']) && empty($_POST)){
	$query = "CALL it_get_hardware($getid,'PD')";
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
		// Date format conversion of valid till to display
		$paiddate = $_SESSION['h']['paid_date'];
		$_SESSION['h']['paid_date'] = $fun->convert_date_display($paiddate);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

if(!empty($_POST)){
	// Amount validation
	$amount = $_POST['amount'];
	if($fun->isnumeric($amount) == true){
		$amountE = 'Please enter the correct Amount'; 
		$test = 'error';		
	}	
	// Validating the required fields  
	// array for printing correct field name in error message
	$fieldtype = array('0', '0', '1');		
	// Actual fields
	$actualfield = array('amount', 'paid date', 'paid by', 'currency type');	
	// Validating the required fields  
   $field = array('amount' => 'amountErr', 'paid_date' => 'paid_dateErr', 'paid_mode' => 'paid_byErr', 
   'currency_type' => 'currency_typeErr');
	$j = 0;
	$dbfield = array('amount','paid_date','paid_mode');
	foreach ($field as $field => $er_var){ 
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$test = 'error';
			$_SESSION['h'][$field] = '';
			$smarty->assign($er_var,$er[$er_var]);
		}else{
			$_SESSION['h'][$field] = $_POST[$field]; 
			$smarty->assign($fields,$_SESSION[$fields]);	
		}
		$j++;
	}

	$field_var = array('amountE');
	foreach ($field_var as $field_var){
		$smarty->assign($field_var,$$field_var);
	}
	// bill and warranty upload and validation
	if(!empty($_POST)){
		// upload directory
		$uploaddir = 'uploads/temp/'; 
		$uploadbill = $uploaddir . basename($_FILES['attach_bill']['name']); 
		$billfile = $_FILES['attach_bill']['name'];
		$billsize = $_FILES['attach_bill']['size'];
		$billtype = $_FILES['attach_bill']['type'];
		
		// Bill file name assigning as session variable
		$size = $billsize;
		$attach_file = 'attach_bill';
		$uploadfile = $uploadbill;
		// required size for validation 			
		$req_size = 1048576;
		if($fun->is_empty($billfile) == true){
			$_SESSION['h']['billfile'] = $_SESSION['h']['bill'];
		}else{
			// file extensions
			$extensions = array('jpeg','jpg','png','gif','pdf','zip'); 
			$bill_ext = explode('/',$billtype)	;
			$bill_ext = end($bill_ext); 
			// checking the file extension is jpg,jpeg,pdf,zip or png
			$file_ext = $bill_ext;
			if($fun->extension_validation($file_ext,$extensions) == true){		
				$billuploadErr = 'Attach bill must be jpg, jpeg, png, gif, pdf, zip';
				$test = 'error';
			}
			// checking the file size is less than 1 MB
			else if($fun->size_validation($size,$req_size)){
				$billuploadErr = 'Bill file size must be less than 1 MB';
				$test = 'error';
			}	
			// checking whether the upload directory is there or not.
			else if($fun->check_uploaded($attach_file,$uploadfile)){
				$billuploadErr = 'Please upload the Bill';
				$test = 'error';
			}
			// uploading file if there is no error
			else{
				$_SESSION['h']['billfile_edit'] = $billfile;
				move_uploaded_file($_FILES['attach_bill']['tmp_name'], $uploadbill);
				}
			}

			// for warranty
			$uploadwar = $uploaddir . basename($_FILES['attach_warranty']['name']); 
			$warfile = $_FILES['attach_warranty']['name'];
			$warsize = $_FILES['attach_warranty']['size'];
			$wartype = $_FILES['attach_warranty']['type'];
			// Warranty file name assigning as session variable
			//$_SESSION['h']['warfile'] = $warfile;
			//$smarty->assign('warfile', $_SESSION['warfile']);
			$size = $warsize;
			$attach_file = 'attach_warranty';
			$uploadfile = $uploadwar;
			// retaining the warranty file name
			if($fun->is_empty($warfile)){
				$_SESSION['h']['warfile'] = $_SESSION['h']['warranty'];
			}else{
				// file extensions
				$extensions = array('jpeg','jpg','png','gif','pdf','zip'); 
				$war_ext = explode('/',$wartype)	;
				$war_ext = end($war_ext); 
				// checking the file extension is jpg,jpeg,pdf,zip or png
				$file_ext = $war_ext;
				if($fun->extension_validation($file_ext,$extensions) == true){	
					$waruploadErr = 'Attach warranty must be jpg, jpeg, png, gif, pdf, zip';
					$test = 'error';
				}
				// checking the file size is less than 50kb
				else if($fun->size_validation($size,$req_size)){
					$waruploadErr = 'Warranty file size must be less than 1 MB';
					$test = 'error';
				}	
				// checking whether the upload directory is there or not.
				else if($fun->check_uploaded($attach_file,$uploadfile)){
					$waruploadErr = 'Please upload the Warranty';
					$test = 'error';
				}
				// uploading file if there is no error
				else{
					$_SESSION['h']['warfile_edit'] = $warfile;
					move_uploaded_file($_FILES['attach_warranty']['tmp_name'], $uploadwar);
				}
			}
	} 
	$smarty->assign('billuploadErr',$billuploadErr);
	$smarty->assign('waruploadErr',$waruploadErr);
	// redirection to next page
	if(empty($test)){
		$_SESSION['h']['edit_hardware_details'] = 'next';
		if($_POST['next_hdn'] == '1'){
			header('Location: edit_hardware_vendor_details.php?id='.$getid.'');	
		}else if($_POST['confirm_hdn'] == '1'){
			header('Location: edit_hardware_confirmation.php?id='.$getid.'');		
		}
	}
	if($_POST['previous_hdn'] == '1'){
		header('Location: edit_hardware_inventory_details.php?id='.$getid.'');		
	}
}
/* Should not come back once it reached list page.
if(empty($_SESSION)){
  header('Location:list_hardware.php');	
}*/
// smarty dropdown array for pade by
$smarty->assign('paid_modes', array('' => 'Select', 'CA' => 'Cash', 'CQ' => 'Cheque', 'OT' => 'Online transfer' ));
$smarty->assign('paid_by',$form['paid_by']);
// smarty dropdown array for amount type
$smarty->assign('currency_types', array('' => 'Select', 'R' => 'INR', 'D' => 'USD'));
$smarty->assign('currency_type',$form['currency_type']);
// closing mysql
$mysql->close_connection();
$smarty->assign('page_title' , 'Edit Hardware - IT'); 
$smarty->assign('hardware_active','active');
$smarty->display('edit_hardware_pricing_details.tpl');
?>
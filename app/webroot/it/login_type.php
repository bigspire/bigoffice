<?php
/* 
   Purpose : To list and search  login type.
   Created : Nikitasa
   Date : 16-06-2016 
*/


//include smarty congig file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// include paging class 
include('classes/class.paging.php');
//include menu_count file
include 'include/menu_count.php';
// include permission file
include 'include/get_modules.php';

// redirect to error page if the user is not it admin
if($roleid != '21'){
	header('Location:'.IT_DIR.'home/');
}
// redirecting to dashboard if the user don't have the permission to this module
if(empty($_SESSION['SettingsLoginType'])){
		session_start();
	header('Location:dashboard.php?access=Access denied!');
}
//unset session
unset($_SESSION['s']);
	
$keyword = $_POST['keyword'] ? $_POST['keyword'] : $_GET['keyword'];
//$l_status = isset($_POST['l_status']) ? $_POST['l_status'] : ($_GET['l_status']  != '' ? $_GET['l_status'] : '1');

// to display the data using status filter
if(isset($_POST['l_status'])){
	$l_status = $_POST['l_status'];
}else if(isset($_GET['l_status'])){
	$l_status = $_GET['l_status'];
}else{
	$l_status = '1';
}

//post url for paging
if($_POST){
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&l_status='.$l_status;
}

// for export
if($_GET['action'] == 'export'){
	$l_status = $_GET['l_status']; 
}

// count the total no. of records
$query = "CALL it_list_login_type('".$keyword."','".$l_status."','0','0','','','".$_GET['action']."')";

try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing login type page');
	}

	// fetch result
	$data_num = $mysql->display_result($result);

	// count result
	$count = $data_num['total'];
	if($count == 0){
		if($keyword){
			$alert_msg = 'No login type "' .$keyword. '" is found in our database';
		}else{
			$alert_msg = 'No login type details found in our database';
		}
	}
	$page = $_GET['page'] ?  $_GET['page'] : 1;
	$limit = 20;

	include('paging_call.php');	

	// set the condition to check ascending or descending order		
	$order = ($_GET['order'] == 'desc') ? 'asc' :  'desc';	
	$sort_fields = array('1' => 'login_type','description','created','modified');
	$org_fields = array('1' => 'title', 'description','created_date','modified_date');

	// to set the sorting image
	foreach($sort_fields as $key => $l_field){
		if($l_field != $_GET['field']){ 
			$smarty->assign('sort_field_'.$l_field,'sorting');
		}else{	
			$order_img = ($_GET['order'] == 'asc') ? 'sorting desc' :  'sorting asc';
			$smarty->assign('sort_field_'.$l_field,$order_img);
		}			
	}
	// if no fields are set, set default sort image
	if(empty($_GET['field']) && empty($keyword)){			
		$order = 'desc';			
		$field = 'created_date';			
		$smarty->assign('sort_field_created', 'sorting desc');
	}	
	$smarty->assign('order', $order);
	// set the original field for the sql query
	if($search_key = array_search($_GET['field'], $sort_fields)){
		$field =  $org_fields[$search_key];
	}

	// free the memory
	$mysql->clear_result($result);
	// execute next query
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch all records
$query = "CALL it_list_login_type('".$keyword."','".$l_status."','$start','$limit','".$field."','".$order."','".$_GET['action']."')";

try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing login page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['status'] = $fun->it_software_status($obj['status']);
 		$data[$i]['status_cls'] = $fun->status_cls($obj['status']);
 		$data[$i]['created_date'] = $fun->it_software_created_date($obj['created_date']);
 		$data[$i]['modified_date'] = $fun->it_software_created_date($obj['modified_date']);
 		$i++;
 		$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);
	}
	// get current date 
	$current_date = $fun->display_date();
	// call to export the excel data
	if(($_GET['action'] == 'export') && ($count > 0)){ 
		include('classes/class.excel.php');
		$excelObj = new libExcel();
		// function to print the excel header
      $excelObj->printHeader($header = array('Title','Description','Created Date','Modified Date','Status') ,$col = array('A','B','C','D','E'));  
		// function to print the excel data
		$excelObj->printCell($data, $count,$col = array('A','B','C','D','E'), $field = array('title','description','created_date','modified_date','status'),'Login Types_'.$current_date);
	}

	// assign login status into array 
	$type = array('' => 'All Status', '1' => 'Active', '0' => 'Inactive');

	// create,update,delete message validation
	if($_GET['status'] == 'deleted' || $_GET['status'] == 'created' || $_GET['status'] == 'updated'){
  		$success_msg = 'Login type ' . $_GET['status'] . ' successfully';
	}

	// validating pagination
	$total_pages = ceil($count / $limit);

	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// calling mysql close db connection function
$c_c = $mysql->close_connection();

$paging->posturl($post_url);

// assign smarty variables here
$smarty->assign('page_links',$paging->print_link_frontend());
$smarty->assign('type', $type);
$smarty->assign('l_status', $l_status);
$smarty->assign('data', $data);
$smarty->assign('page' , $page); 
$smarty->assign('total_pages' , $total_pages); 	
$smarty->assign('keyword' , $keyword); 	
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);
// assign page title
$smarty->assign('page_title' , 'Login Type - IT');  
// assigning active class status to smarty menu.tpl
$smarty->assign('settings_active' , 'active'); 	  
// display smarty file
$smarty->display('login_type.tpl');
?>
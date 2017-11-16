<?php 
/* 
Purpose : To view dashboard
Created : Nikitasa 
Date : 17-06-2016
*/
session_start();

ini_set('display_errors', 1);

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
//include menu_count file
include 'include/menu_count.php';


// query for fetch software type graph 
$query = 'call it_get_sw_type_graph()';
// calling mysql exe_query function
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing software type graph');
	}
	// fetch result
	while($obj = $mysql->display_result($result)){
	 $data_sw_type[] = $obj; 
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query for fetch software type graph 
$query = 'call it_get_sw_edition_graph()';
// calling mysql exe_query function
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing software edition graph');
	}
	// fetch result
	while($obj = $mysql->display_result($result)){
	 $data_sw_edition[] = $obj; 
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query for fetch assign software graph 
$query = 'call it_get_sw_assigned_graph()';
// calling mysql exe_query function
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing software edition graph');
	}
	// fetch result
	while($obj = $mysql->display_result($result)){
	 $data_assign_sw[] = $obj; 
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query for fetch hardware type graph
$query = 'call it_get_hw_type_graph()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing hardware graph page');
	}
	// fetch result
	while($obj = $mysql->display_result($result)){
		$data_hw_type[] = $obj;
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query for fetch hardware brand graph
$query = 'call it_get_hw_brand_graph()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing hardware graph page');
	}
	$i = 0;
	// fetch result
	while($obj = $mysql->display_result($result)){
		$data_hw_brand[] = $obj;
		$data_hw_brand[$i]['brand'] = $obj['brand'];
		$i++;
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query for fetch assign hardware graph
$query = 'call it_get_hw_assigned_graph()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing hardware graph page');
	}
	$i = 0;
	// fetch result
	while($obj = $mysql->display_result($result)){
		$data_assign_hw[] = $obj;
		$data_assign_hw[$i]['brand'] = $obj['brand'];
		$i++;
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


// get unassigned hardware by brand graph
//$data_unassigned_hw['brand'] = array_diff($data_hw_brand , $data_assign_hw);
//print_r($data_unassigned_hw);

// query for fetch records
$query = 'call it_get_request_change_graph()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing req. change page');
	}
	// fetch result
	$i = 0;
	while($obj = $mysql->display_result($result)){
		$data_req_change[] = $obj;
		$data_req_change[$i]['status'] = $fun->dashboard_status($obj['status']);
		$i++;
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query for fetch records
$query = 'call it_get_ticket_graph()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing ticket graph page');
	}	// fetch result
	$i = 0;
	while($obj = $mysql->display_result($result)){
	 $data_ticket[] = $obj;
	 $data_ticket[$i]['status'] = $fun->ticket_status($obj['status']);
	 $i++;
	}
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


/*
foreach($data_hw_brand as $item => $rec){
	foreach($data_assign_hw as $item1 => $rec1){
		//$data_unassigned_hw[] = array_diff($rec,$rec1);
		print_r($data_unassigned_hw = array_merge(array_diff($rec, $rec1), array_diff($rec1, $rec)));die;
		//print_r($data_unassigned_hw);
	}
}
*/




// assign smarty variables here
$smarty->assign('data_sw_type', $data_sw_type);
$smarty->assign('data_assign_sw', $data_assign_sw);
$smarty->assign('data_sw_edition', $data_sw_edition);
$smarty->assign('data_hw_type', $data_hw_type);
$smarty->assign('data_hw_brand', $data_hw_brand);
$smarty->assign('data_assign_hw', $data_assign_hw);
$smarty->assign('data_req_change', $data_req_change);
$smarty->assign('data_ticket', $data_ticket);
$smarty->assign('data_unassigned_hw' , $data_unassigned_hw);
// assign page title
$smarty->assign('page_title' , 'Home - IT');  
// assigning active class status to smarty menu.tpl
$smarty->assign('dashboard_active' , 'active'); 	  
// display smarty template
$smarty->display('dashboard.tpl');
?>
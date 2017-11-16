<?php
// crreate array 
$array = array(
			'tamil nadu' =>array('select district','kanchipuram','thiruvallur','chennai','cuddaloure','villupuram','thiruvannamalai','selam','nellai'),
			'kerala' => array('select district','kerala 1','kerala 2','kerl 3','kerala4','kerala 5'),
			'mumbai' => array('select district','mumbia 1','mumbai 2','mumbai 3','mumbai 4','mumbai 5'),
);
//var_dump($array);
// get the value from form page
if(isset($_GET['s'])){
	$c = $_GET['s'];
 if(isset($array[$c])){
		for($i =0;$i<count($array[$c]);$i++){
				echo "<option value='".$array[$c][$i]."'>".$array[$c][$i]."</option>";
			
        } //echo $array[$c][$i];
       }
  }
?>

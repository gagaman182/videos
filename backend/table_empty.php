<?php
	 header('Access-Control-Allow-Origin: *');
   


	 $data = array();
	 $a = array();

	$a['hn']='-';
	$a['opddate']='-';
	$a['halfplace']='-';
	$a['opdno']='-';

	
	


	
	array_push($data,$a);
	
	


echo json_encode($data);







?>

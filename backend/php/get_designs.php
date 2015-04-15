<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=iso-8859-1");
	include_once('connection.php');
	$connection = new Connection();
	$connect = $connection->connect();
	$result = $connect->query("SELECT * FROM diy_designs");
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"design_id":"'.$rs["design_id"].'",';
	    $outp .= '"img":"'.$rs["img"].'",';
	    $outp .= '"user_id":"'.$rs["user_id"].'"}';
	}
	$outp .="]";
	$connection->disconnect($connect);
	echo $outp;
?>
<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=iso-8859-1");
	include_once('connection.php');
	$connection = new Connection();
	$connect = $connection->connect();
	$result = $connect->query("SELECT * FROM diy_orders");
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"order_id":"'.$rs["order_id"].'",';
	    $outp .= '"user_id":"'.$rs["user_id"].'",';
	    $outp .= '"date":"'.$rs["date"].'",';
	    $outp .= '"total":"'.$rs["total"].'",';
	    $outp .= '"description":"'. $rs["description"]. '"}';
	}
	$outp .="]";
	$connection->disconnect($connect);
	echo $outp;
?>
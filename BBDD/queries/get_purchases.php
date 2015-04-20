<?php
	session_start();
	include_once('../connections/connection.php');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	$connection = new Connection();
	$conn = $connection->connect();

	$result = $conn->query("SELECT * FROM diy_orders");

	$outp = "[";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"order_id":'  . $rs["order_id"] . ',';
	    $outp .= '"user_id":'   . $rs["user_id"]        . ',';
	    $outp .= '"date":"'. $rs["date"]     . '",';
	    $outp .= '"total":'. $rs["total"]     . ',';
	    $outp .= '"description":"'. $rs["description"]     . '"}';
	}

	$outp .="]";

  	$conn->close();
  	echo($outp);
?>
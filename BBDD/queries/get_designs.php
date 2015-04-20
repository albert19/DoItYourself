<?php
	session_start();
	include_once('../connections/connection.php');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	$connection = new Connection();
	$conn = $connection->connect();

	$result = $conn->query("SELECT * FROM diy_designs");

	$outp = "[";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"design_id":'  . $rs["design_id"] . ',';
	    $outp .= '"img":"'   . $rs["img"]        . '",';
	    $outp .= '"user_id":'. $rs["user_id"]     . ',';
	    $outp .= '"status":"'. $rs["status"]     . '",';
	    $outp .= '"likes":'. $rs["likes"]     . ',';
	    $outp .= '"used":'. $rs["used"]     . '}';
	}

	$outp .="]";

  	$conn->close();
  	echo($outp);
?>
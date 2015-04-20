<?php
	session_start();
	include_once('../connections/connection.php');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	$connection = new Connection();
	$conn = $connection->connect();

	$result = $conn->query("SELECT * FROM diy_users");

	$outp = "[";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"user_id":'  . $rs["user_id"] . ',';
	    $outp .= '"name":"'   . $rs["name"]        . '",';
	    $outp .= '"surnames":"'. $rs["surnames"]     . '",';
	    $outp .= '"email":"'. $rs["email"]     . '"}';
	}

	$outp .="]";

  	$conn->close();
  	echo($outp);
?>
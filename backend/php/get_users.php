<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=iso-8859-1");
	include_once('connection.php');
	$connection = new Connection();
	$connect = $connection->connect();
	$result = $connect->query("SELECT * FROM diy_users");
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"user_id":"'.$rs["user_id"].'",';
	    $outp .= '"name":"'.$rs["name"].'",';
	    $outp .= '"surname":"'.$rs["surname"].'",';
	    $outp .= '"email":"'.$rs["email"].'",';
	    $outp .= '"password":"'. $rs["password"]. '"}';
	}
	$outp .="]";
	$connection->disconnect($connect);
	echo $outp;
?>
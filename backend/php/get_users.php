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
	    $outp .= '"surnames":"'.$rs["surnames"].'",';
	    $outp .= '"email":"'.$rs["email"].'",';
	    $outp .= '"hash_pass":"'. $rs["hash_pass"]. '"}';
	}
	$outp .="]";
	$connection->disconnect($connect);
	echo $outp;
?>
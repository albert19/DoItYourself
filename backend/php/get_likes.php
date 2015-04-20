<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=iso-8859-1");
	include_once('connection.php');
	$connection = new Connection();
	$connect = $connection->connect();
	$result = $connect->query("SELECT * FROM diy_likes");
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"pred_id":"'.$rs["pred_id"].'",';
	    $outp .= '"user_id":"'.$rs["user_id"].'",';
	    $outp .= '"design_id":"'.$rs["design_id"].'",';
	    $outp .= '"like_id":"'. $rs["like_id"]. '"}';
	}
	$outp .="]";
	$connection->disconnect($connect);
	echo $outp;
?>
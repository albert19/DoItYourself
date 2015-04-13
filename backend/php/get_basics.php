<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=iso-8859-1");
	include_once('connection.php');
	$connection = new Connection();
	$connect = $connection->connect();
	$result = $connect->query("SELECT * FROM diy_basics");
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"clothe_id":"'.$rs["clothe_id"].'",';
	    $outp .= '"type":"'.$rs["type"].'",';
	    $outp .= '"base_price":"'.$rs["base_price"].'",';
	    $outp .= '"color":"'.$rs["color"].'",';
	    $outp .= '"img":"'. $rs["img"]. '"}';
	}
	$outp .="]";
	$connection->disconnect($connect);
	echo $outp;
?>
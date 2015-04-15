<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=iso-8859-1");
	include_once('connection.php');
	$connection = new Connection();
	$connect = $connection->connect();
	$result = $connect->query("SELECT * FROM diy_predesigns");
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"pred_id":"'.$rs["pred_id"].'",';
	    $outp .= '"clothe_id":"'.$rs["clothe_id"].'",';
	    $outp .= '"total_price":"'.$rs["total_price"].'",';
	    $outp .= '"user_id":"'.$rs["user_id"].'",';
	    $outp .= '"img_front":"'.$rs["img_front"].'",';
	    $outp .= '"img_back":"'.$rs["img_back"].'",';
	    $outp .= '"img_left":"'.$rs["img_left"].'",';
	    $outp .= '"img_right":"'.$rs["img_right"].'",';
	    $outp .= '"likes":"'.$rs["likes"].'",';
	    $outp .= '"boughts":"'. $rs["boughts"]. '"}';
	}
	$outp .="]";
	$connection->disconnect($connect);
	echo $outp;
?>
<?php
	session_start();
	include_once('../connections/connection.php');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	$connection = new Connection();
	$conn = $connection->connect();

	$postData =file_get_contents("php://input");

	$postData2 = json_decode($postData);

	$pred_id = $postData2->pred_id;
	$pred_id2="'" . $conn->real_escape_string((int)$pred_id) . "'";

	$sql="UPDATE diy_predesigns SET status='PUBLIC' WHERE pred_id = $pred_id2";
	$conn->query($sql);

	$result = $conn->query("SELECT * FROM diy_predesigns");

	$outp = "[";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"pred_id":'  . $rs["pred_id"] . ',';
	    $outp .= '"clothe_id":'   . $rs["clothe_id"]        . ',';
	    $outp .= '"total_price":'. $rs["total_price"]     . ',';
	    $outp .= '"user_id":'. $rs["user_id"]     . ',';
	    $outp .= '"img_front":"'. $rs["img_front"]     . '",';
	    $outp .= '"img_back":"'. $rs["img_back"]     . '",';
	    $outp .= '"img_left":"'. $rs["img_left"]     . '",';
	    $outp .= '"img_right":"'. $rs["img_right"]     . '",';
	    $outp .= '"likes":'. $rs["likes"]     . ',';
	    $outp .= '"boughts":'. $rs["boughts"]     . ',';
	    $outp .= '"status":"'. $rs["status"]     . '"}';
	}

	$outp .="]";

  	$conn->close();
  	echo($outp);
?>
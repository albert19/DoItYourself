<?php
	session_start();
	include_once('../connections/connection.php');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	$connection = new Connection();
	$conn = $connection->connect();

	$postData =file_get_contents("php://input");

	$postData2 = json_decode($postData);

	$design_id = $postData2->design_id;
	$design_id2="'" . $conn->real_escape_string((int)$design_id) . "'";

	$sql="UPDATE diy_designs SET status='PUBLIC' WHERE design_id = $design_id2";
	$conn->query($sql);

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
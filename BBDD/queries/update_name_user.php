<?php
	session_start();
	include_once('../connections/connection.php');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	$connection = new Connection();
	$conn = $connection->connect();

	$postData =file_get_contents("php://input");

	$postData2 = json_decode($postData);

	$user_id = $postData2->user_id;
	$new_name = $postData2->new_name;
	$user_id2 = "'" . $conn->real_escape_string((int)$user_id) . "'";

	$sql="UPDATE diy_users SET name='$new_name' WHERE user_id = $user_id2";
	$conn->query($sql);

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
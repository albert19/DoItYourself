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
	$new_password = $postData2->new_password;
	$new_hash_password = md5($new_password);
	$current_password = $postData2->current_password;
	$email = $postData2->email;
	$user_id2 = "'" . $conn->real_escape_string((int)$user_id) . "'";

	$result = $conn->query("SELECT * FROM diy_users");

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($rs['email'] == $email) {
		    if ($rs['hash_pass'] == md5($current_password)) {
		    	$sql="UPDATE diy_users SET hash_pass='$new_hash_password' WHERE user_id = $user_id2";
				$conn->query($sql);
				$status = "ok";
		    } else {
		    	$status = "error";
		    }
		}
	}

	$outp2 = '[';
	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		if ($outp2 != "[") {$outp2 .= ",";}
	    $outp2 .= '{"user_id":'  . $rs["user_id"] . ',';
	    $outp2 .= '"name":"'   . $rs["name"]        . '",';
	    $outp2 .= '"surnames":"'. $rs["surnames"]     . '",';
	    $outp2 .= '"email":"'. $rs["email"]     . '"}';
	}
	$outp2 .= ']';

	$outp = '[{"status":"'.$status.'","result":"'.$outp2.'"}]';

  	$conn->close();
  	echo($outp);
?>
<?php
	session_start();
	include_once('../connections/connection.php');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	$connection = new Connection();
	$conn = $connection->connect();

	$postData =file_get_contents("php://input");

	$postData2 = json_decode($postData);

	$email = $postData2->email;
	$password = $postData2->password;
	$hash_input_pass = md5($password);

	$result = $conn->query("SELECT * FROM diy_users");

	while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		if ($rs['email'] == $email) {
			if ($rs['hash_pass'] == $hash_input_pass) {
				$_SESSION['email'] = $rs['email'];
				$_SESSION['user_id'] = $rs['user_id'];
				$_SESSION['name'] = $rs['name'];
				$_SESSION['surnames'] = $rs['surnames'];
				$status = "ok";
				$id = $_SESSION['user_id'];
				$name = $_SESSION['name'];
				$surnames = $_SESSION['surnames'];
				$email = $_SESSION['email'];
			} else {
				$status = "error";
				$id = null;
				$name = null;
				$surnames = null;
				$email = null;
			}
		}
	}
  	$conn->close();
  	$result = '[{"status":"'.$status.'","id":"'.$id.'","name":"'.$name.'","surnames":"'.$surnames.'","email":"'.$email.'"}]';
  	echo($result);
?>
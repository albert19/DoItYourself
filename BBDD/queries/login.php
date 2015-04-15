<?php
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
				$_COOKIE['user'] = $rs['email'];
				if (isset($_COOKIE['user'])) {
					$check = 1;
				}
			} else {
				$check = 0;
			}
		}
	}
  	$conn->close();
  	echo($check);
?>
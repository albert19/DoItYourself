<?php
	include_once('../connections/connection.php');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	$connection2 = new Connection();
	$conn2 = $connection2->connect();

	$postData =file_get_contents("php://input");

	$postData2 = json_decode($postData);

	$email2 = $postData2->email2;

	$result2 = $conn2->query("SELECT * FROM diy_users WHERE email = 'lopez.albert81@gmail.com'");
	$row = mysql_fetch_array($result2);
	if ($row['email'] == "lopez.albert81@gmail.com") {
		$outp2 = 1;
	} else {
		$outp2 = 0;
	}
  	$conn2->close();
  	echo($outp2);
?>
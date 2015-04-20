<?php
	session_start();
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	if (isset($_SESSION['name'])) {
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
	$result = '[{"status":"'.$status.'","id":"'.$id.'","name":"'.$name.'","surnames":"'.$surnames.'","email":"'.$email.'"}]';
  	echo($result);
?>
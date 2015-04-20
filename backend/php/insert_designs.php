<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('connection.php');
$connection= new Connection();
$connect=$connection->connect();

$dadesPost =file_get_contents("php://input");
$dadesDesc = json_decode($dadesPost);

$user_id=$dadesDesc->user_id;
$file=$dadesDesc->image_name;

$result = $connect->query("INSERT INTO diy_designs(user_id,img) VALUES ('".$user_id."','".$file."')");

$connection->disconnect($connect);

?>git 
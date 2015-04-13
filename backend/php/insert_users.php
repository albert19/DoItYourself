<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('connection.php');
$connection= new Connection();
$connect=$connection->connect();

$dadesPost =file_get_contents("php://input");
$dadesDesc = json_decode($dadesPost);

$name=$dadesDesc->name;
$surnames=$dadesDesc->surnames;
$email=$dadesDesc->email;
$pass=$dadesDesc->pass;

$hash_pass=md5($pass);

$result = $connect->query("INSERT INTO diy_users(name,surnames,email,hash_pass) VALUES ('".$name."','".$surnames."','".$email."','".$hash_pass."')");

$conn->close();

?>
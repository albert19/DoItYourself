<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('connection.php');
$connection= new Connection();
$connect=$connection->connect();

$dadesPost =file_get_contents("php://input");
$dadesDesc = json_decode($dadesPost);

$type=$dadesDesc->type;
$base_price=$dadesDesc->base_price;
$color=$dadesDesc->color;
$file='hey.png';
$result = $connect->query("INSERT INTO diy_basics(type,base_price,color,img) VALUES ('".$type."','".$base_price."','".$color."','".$file."')");

$conn->close();

?>
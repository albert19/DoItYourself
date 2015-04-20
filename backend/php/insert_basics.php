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
$img_front=$dadesDesc->img_front;
$img_back=$dadesDesc->img_back;
$img_right=$dadesDesc->img_right;
$img_left=$dadesDesc->img_left;

$result = $connect->query("INSERT INTO diy_basics(type,base_price,color,img_front,img_back,img_left,img_right) VALUES ('".$type."','".$base_price."','".$color."','".$img_front."','".$img_back."','".$img_left."','".$img_right."')");
$connection->disconnect($connect);

?>
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('connection.php');
$connection= new Connection();
$connect=$connection->connect();

$dadesPost =file_get_contents("php://input");
$dadesDesc = json_decode($dadesPost);

$clothe_id=$dadesDesc->clothe_id;
$total_price=$dadesDesc->$total_price;
$user_id=$dadesDesc->user_id;
$img='hola';
$likes=$dadesDesc->likes;
$boughts=$dadesDesc->boughts;

$result = $connect->query("INSERT INTO diy_predesigns(clothe_id,total_price,user_id,img,likes,boughts) VALUES ('".$clothe_id."','".$total_price."','".$user_id."','".$img."','".$likes."','".$boughts."')");

$conn->close();

?>
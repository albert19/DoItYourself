<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('connection.php');
$connection= new Connection();
$connect=$connection->connect();

$dadesPost =file_get_contents("php://input");
$dadesDesc = json_decode($dadesPost);

$id=$dadesDesc->id;
$result = $connect->query("DELETE FROM diy_basics WHERE clothe_id='".$id."'");

$conn->close();

?>
<?php
	header("Access-Control-Allow-Origin: *");
	move_uploaded_file($_FILES["file_front"]["tmp_name"],'../../img/predesigns/'.$_FILES["file_front"]["name"]);
	move_uploaded_file($_FILES["file_back"]["tmp_name"],'../../img/predesigns/'.$_FILES["file_back"]["name"]);
	move_uploaded_file($_FILES["file_left"]["tmp_name"],'../../img/predesigns/'.$_FILES["file_left"]["name"]);
	move_uploaded_file($_FILES["file_right"]["tmp_name"],'../../img/predesigns/'.$_FILES["file_right"]["name"]);
	
?>

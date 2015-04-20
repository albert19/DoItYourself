<?php
	header("Access-Control-Allow-Origin: *");
	move_uploaded_file($_FILES["file"]["tmp_name"],'../../img/designs/'.$_FILES["file"]["name"]);
	
?>

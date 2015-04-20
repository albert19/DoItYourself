<?php
	include_once('configuration.php');
	class Connection extends Configuration {
		function connect() {
			$conn  = new mysqli($this->hostname,$this->user,$this->pass,$this->db);
			if ($conn->connect_error) {
				echo $this->error_message;
			} else {
				return $conn;
			}
		}
		function disconnect($con_obj) {
			if ($con_obj) {
				$con_obj->close();
			} else {
				echo $this->error_connection_exist;
			}
			}
		}
	
?>
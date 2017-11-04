<?php 
	$conn = mysqli_connect("localhost", "root", "", "soundplay");
	if(!$conn){
		$result["login-status"]= false;
		echo json_encode($result);
		die();
	}
?>

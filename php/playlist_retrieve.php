<?php 
	session_start();
	$user_id = $_SESSION['soundplay']['user_id'];
	$conn = mysqli_connect("localhost", "root", "", "soundplay");
	//Check Connection
	if(!$conn) {
		$result['connStatus'] = false;
		$result['error'] = $conn->connect_error;
		echo json_encode($result);
		die();
	} else {
		$result['connStatus'] = true;
	}

	$query = "SELECT playlist_id, playlist_name from playlist WHERE user_id = '".$user_id."'";

	$playlist = array();
	$sql_data = $conn->query($query);
	if($sql_data->num_rows == 0) {
		$result['error'] = true;
		echo json_encode($result);
		die();
	}
	while ($row = $sql_data->fetch_assoc()) {
		array_push($playlist, $row);
	}
	$result['playlist'] = $playlist;
	echo json_encode($result);

	$conn->close();
?>
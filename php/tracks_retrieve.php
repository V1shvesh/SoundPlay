<?php 
	session_start();
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

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$playlist_id = test_input($_POST['playlist_id']);

	$query_select_songs = "SELECT title, album, artist, track_id, path FROM tracks NATURAL JOIN includes WHERE includes.playlist_id = {$playlist_id}";
	$sql_data = $conn->query($query_select_songs);
	$tracks = array();

	while ($row = $sql_data->fetch_assoc()) {
		array_push($tracks, $row);
	}
	$result['tracks'] = $tracks;
	$result['username'] = $_SESSION['soundplay']['username'];
	$result['playlist_name'] = $_POST['playlist_name'];
	echo json_encode($result);
	$conn->close();
?>
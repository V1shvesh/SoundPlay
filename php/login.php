<?php 
	session_start();
	$conn = mysqli_connect("localhost", "root", "l33t@Wifi", "soundplay");
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

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);

	$query = "SELECT * from user WHERE user_name = '".$username."'";

	$sql_data = $conn->query($query);
	if($sql_data->num_rows == 0) {
		$result['loginStatus'] = false;
		$result['error'] = "Incorrect Username/Password";
		echo json_encode($result);
		die();
	}

	$row = $sql_data->fetch_assoc();
	$password_fetched = $row['password'];

	if(!password_verify($password_fetched, $password)) {
		$result['user_id'] = $row['user_id'];
		$result['username'] = $row['user_name'];
		$result['loginStatus'] = true;
		$_SESSION['soundplay']['user_id'] = $result['user_id'];
	} else {
		$result['loginStatus']= false;
		$result['error'] = "Incorrect Username/Password";
		echo json_encode($result);
		die();
	}
	echo json_encode($result);

	$conn->close();
?>

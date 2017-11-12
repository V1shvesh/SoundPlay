<?php 
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "soundplay");

	
	// Check Connection
	if(!$conn){
		$result['connStatus'] = false;
		$result['error'] = $conn->connect_error;
		echo json_encode($result);
		die();
	} else {
		$result["connStatus"] = true;
	}
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$re_password = test_input($_POST['password_reenter']);

	// Check if user exists
	$query = "SELECT * FROM user WHERE user_name = '".$username."'";

	// $sql_data = $conn->query($query);
	// if ($sql_data->num_rows > 0) {	// Sign Up failed
	// 	$result['signupStatus'] = false;
	// 	$result['error'] = "Username already taken";
	// 	echo json_encode($result);
	// 	die();
	// } else if ($password != $re_password) {	// Sign Up failed
	// 	$result['signupStatus'] = false;
	// 	$result['error'] = "Passwords don't match";
	// 	echo json_encode($result);
	// 	die();
	// }
	// $pass_hash = password_hash($password, PASSWORD_DEFAULT);

	// $query = "INSERT INTO user (user_name, password) VALUES ('$username', '$pass_hash')";
	// if (!$conn->query($query)) {
	// 	$result['signupStatus'] = false;
	// 	$result['error'] = "Unable to create ID";
	// 	echo json_encode($result);
	// 	die();
	// }
	
	$query = "SELECT user_id FROM user WHERE user_name = '".$username."'";
	$sql_data = $conn->query($query);
	var_dump($sql_data);
	// $row = $sql_data->fetch_assoc();

	// $result['signupStatus'] = true;
	// $result['error'] = false;
	// $result['user_id'] = $row['user_id'];
	// $result['username'] = $username;
	// $_SESSION['soundplay']['user_id'] = $row['user_id'];

	echo json_encode($result);

	$conn->close();
	
?>

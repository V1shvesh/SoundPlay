 <?php
 	session_start();
 	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	$conn = mysqli_connect("localhost", "root", "", "soundplay");
	//Check Connection
	if(!$conn){
		$result['connStatus'] = false;
		$result['error'] = $conn->connect_error;
		echo json_encode($result);
		die();
	} else {
		$result['connStatus'] = true;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);

	$query = "SELECT * from user WHERE user_name = '".$username."'";

	$sql_data = $conn->query($query);
	if($sql_data->num_rows == 0){
		$result['loginStatus'] = false;
		$result['error'] = "Incorrect Username/Password";
		echo json_encode($result);
		die();
	}

	$row = $sql_data->fetch_assoc();
	$password_fetched = $row['password'];
	var_dump($password_fetched);
	var_dump($password);

	if($password_fetched == $password) {
		$result['user_id'] = $row['user_id'];
	// 	$result['username'] = $row['user_name'];
	// 	$result['loginStatus'] = true;
	// 	$_SESSION['soundplay']['user_id'] = $result['user_id'];
	} 
	// else {
	// 	$result['loginStatus']= false;
	// 	$result['error'] = "Incorrect Username/Password";
	// 	echo json_encode($result);
	// 	die();
	// }
?>

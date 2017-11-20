<!DOCTYPE html>
<?php
	session_start(['cookie_lifetime' => 86400]);
?>
<head>
	<title>Upload</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/fonts.css"/>
	<link rel="stylesheet" type="text/css" href="css/upload.css"/>
	<link rel="stylesheet" type="text/css" href="css/navbar.css"/>
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/jsmediatags.js"></script>
	<script type="text/javascript" src="./js/upload.js"></script>
</head>
<body>
<?php if($_SESSION['soundplay']['user_id']): ?>
	<div class="navbar">
		<a href="http://localhost/SoundPlay/">SoundPlay</a>
			<div class="nav-buttons">
				<button id="logout-btn" class="navbtn child-last">Log Out</button>
				<button id="home-btn" class="navbtn child-first">Home</button>
			</div>				
	</div>
	<form method="POST" class="upload-form" enctype=multipart/form-data>
		<span id="login-error" class="error"></span>
		<label class="upload-tag">Title</label>
		<input type="text" name="title"><br>
		<label class="upload-tag">Artist</label>
		<input type="text" name="artist"><br>
		<label class="upload-tag">Album</label>
		<input type="text" name="album"><br>
		<div class="upload-list">
			<label class="upload-tag">Playlist</label>
			<div class="upload-select">
				<select name="playlist">
					<option value=""></option>
				</select>
			</div><br>
		</div>
		<div class="new-playlist">
			<label class="upload-tag">New</label>
			<input type="text" name="new-playlist"><br>
		</div>
		<label class="upload-tag">File</label>
		<input type="text" name="filepath" class="filepath" disabled>
		<div class="upload-file-wrapper">
			<input id="upload-file" class="upload-file" type="file" name="file"/>
			<label tabindex="0" for="upload-file" class="upload-file-trigger">Select a file...</label>
		</div>
		<br>
		<input type="submit" name="upload" value="Upload">
	</form>
<?php else:  ?>
<?php endif; ?>	
<?php
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if(isset($_POST['upload'])){
		$target_temp =  $_FILES["file"]["tmp_name"];
		$target_dir = realpath(dirname('upload.php'))."/tracks/";
		$conn = mysqli_connect("localhost", "root", "", "soundplay");
		//Check Connection
		if(!$conn) {
			$error = '<span class="error">Can\'t connect to Server!!</span><br>';
			echo $error;
			die();
		}

		$user_id = $_SESSION['soundplay']['user_id'];
		$playlist_id = $_POST['playlist'];
		
		// If new playlist is to be created
		if($playlist_id === "new"){
			$query_insert_playlist = "INSERT INTO playlist(user_id, playlist_name) VALUES ('".$user_id."', '".$_POST['new-playlist']."')";
			if($conn->query($query_insert_playlist) === false){
				$error = "<span class=\"file-error\">Can't create new Playlist</span><br>";
				echo $error;
				die();
			}
			$playlist_id = $conn->insert_id;
		}

		$target_dir .= $user_id.'/';
		$oldmask = umask();
		if(!is_dir($target_dir)){
			mkdir($target_dir,0777);
		}
		$target_dir .= $playlist_id.'/';
		if(!is_dir($target_dir)){
			mkdir($target_dir,0777);
		}
		umask($oldmask);

		$query_insert_track = "INSERT INTO tracks (title, album, artist, track_id, path) VALUES ('{$_POST['title']}','{$_POST['album']}','{$_POST['artist']}',NULL,'{$target_dir}')";
		if(mysqli_query($conn,$query_insert_track) === false){
			$error = "<span class=\"file-error\">Can't create new Track</span><br>";
			echo $error;
			die();	
		}
		$track_id = mysqli_insert_id($conn);

		$query_insert_include = "INSERT INTO includes (playlist_id, track_id) VALUES ('{$playlist_id}','{$track_id}')";
		if(mysqli_query($conn, $query_insert_include) === false){
			$error = "<span class=\"file-error\">Can't include track in playlist</span><br>";
			echo $error;
			die();
		}


		$target_file = $target_dir.$track_id.'.mp3';
		if (move_uploaded_file($target_temp, $target_file)) {
        	echo "<span class=\"file-success\">The file ". basename( $_FILES["file"]["name"]). " has been uploaded.</span><br>";
        	$oldmask = umask();
        	chmod($target_file, 0777);
        	umask($oldmask);
    	} else {
        	echo "<span class=\"file-error\">Sorry, there was an error uploading your file.</span><br>";
    	}
	}
	$conn->close();
?>
</body>

</html>
<!DOCTYPE html>

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
		<div class="navbar">
		<a href="http://localhost/SoundPlay/">SoundPlay</a>
		<?php if(!$_SESSION['soundplay']['user_id']): ?>
		<?php else: ?>
			<div class="nav-buttons">
				<button id="logout-btn" class="navbtn child-last">Log Out</button>
				<button id="upload-btn" class="navbtn child-mid">Upload</button>
				<button id="playlist-btn" class="navbtn child-first">Playlist</button>
			</div>				
		<?php endif; ?>	
	</div>
	<form class="upload-form">
		<span id="login-error" class="error">Can't upload file</span>
		<label class="upload-tag">Title</label>
		<input type="text" name="title"><br>
		<label class="upload-tag">Artist</label>
		<input type="text" name="artist"><br>
		<label class="upload-tag">Album</label>
		<input type="text" name="album"><br>
		<label class="upload-tag">Year</label>
		<input type="number" name="year" min="1900" max="2100"><br>
		<div class="upload-list">
			<label class="upload-tag">Playlist</label>
			<div class="upload-select">
				<select name="playlist">
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

</body>

</html>
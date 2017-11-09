<!DOCTYPE html>

<head>
	<title>Upload</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/fonts.css"/>
	<link rel="stylesheet" type="text/css" href="css/upload.css"/>
	<link rel="stylesheet" type="text/css" href="css/navbar.css"/>
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/upload.js"></script>
</head>

<body>
		<div class="navbar">
		<a href="http://localhost/SoundPlay/">SoundPlay</a>
		<?php if(!$_SESSION['soundplay']['user_id']): ?>
			<div class="nav-buttons">
					<button id="signup-btn" class="navbtn child-last">Sign Up</button>
					<!-- TODO seperate js functions -->
					<button id="login-btn" class="navbtn child-first">Log In</button>
			</div>
			<div id="login-form" class="hover-form">
				<div id="login-arrow" class="arrow-up">
				
				</div>
				<form>
					<input type="text" name="username" class="username" placeholder="Username" required/>
					<input type="password" name="password" class="password" placeholder="Password" maxlength="20" required/>
					<span id="login-error" class="error">Incorrect Username/Password</span>
					<button type="submit" class="submit-button">Log In</button>
				</form>	
			</div>
			<div id="signup-form" class="hover-form">
				<div id="signup-arrow" class="arrow-up">
			
				</div>
				<form>
					<input type="text" name="username" class="username" placeholder="Username" required/>
					<input type="password" name="password" class="password" placeholder="Password" maxlength="20" required/>
					<input type="password" name="password_reenter" class="password" placeholder="Re-Enter Password" maxlength="20" required/>
					<button type="submit" class="submit-button">Sign Up</button>
				</form>
			</div>
		<?php else: ?>
			<div class="nav-buttons">
				<button id="logout-btn" class="navbtn child-last">Log Out</button>
				<button id="upload-btn" class="navbtn child-mid">Upload</button>
				<button id="playlist-btn" class="navbtn child-first">Playlist</button>
			</div>				
		<?php endif; ?>	
	</div>
	<form class="upload-form">
		<label class="upload-tag">Title</label>
  		<input type="text" name="Title"><br>
  		<label class="upload-tag">Artist</label>
  		<input type="text" name="Artist"><br>
  		<label class="upload-tag">Album</label>
  		<input type="text" name="Album"><br>
  		<label class="upload-tag">Year</label>
  		<input type="number" name="Year" min="1900" max="2100"><br>
  		<label class="upload-tag">File</label>
  		<input type="text" name="filepath">
  		<input type="file" name="File"><br>
  		<input type="submit" name="upload" value="Upload">
  	</form>

</body>

</html>
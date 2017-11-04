<?php
	session_start(['cookie_lifetime' => 86400]);
?>
<!DOCTYPE html>
<html>
<head>
	<title>SoundPlay - Online Playlist Curator</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/fonts.css"/>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/navbar.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
</head>
<body>
	<div class="navbar">
		<a href="http://localhost/Soundplay/"><h1>SoundPlay</h1></a>
		<div class="nav-buttons">
			<?php if(!$_SESSION['soundplay']['user_id']): ?>
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
			<?php else: ?>
				<button id="logout-btn" class="navbtn child-last">Log Out</button>
				<button id="upload-btn" class="navbtn child-mid">Upload</button>
				<button id="playlist-btn" class="navbtn child-first">Playlist</button>
			<?php endif; ?>	
		</div>
	</div>
	<div class="bg1 parallax">
	</div>
	<div class="description">
		<span class="desc-head">Tune In.Tune Out.</span>
		<p>Simple as 1,2,3,4.</p>
	</div>
	<div class="bg2 parallax">
	</div>
</body>
</html>

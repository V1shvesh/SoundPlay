<?php
	session_start([
		'cookie_lifetime' => 86400,
	]);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Player</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/fonts.css"/>
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/playlist.css">
	<link rel="stylesheet" type="text/css" href="css/playbar.css">
	<link rel="stylesheet" type="text/css" href="css/redirect.css">
	<script type="text/javascript" src="./js/howler.js"></script>
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/player.js"></script>
</head>
<body>
<?php if($_SESSION['soundplay']['user_id']): ?>
	<div class="navbar">
		<a href="http://localhost/Soundplay/">SoundPlay</a>
		<div class="nav-buttons">
			<button id="logout-btn" class="navbtn child-last">Log Out</button>
			<button id="home-btn" class="navbtn child-first">Home</button>
		</div>
	</div>
	<div class="playlist">
		<div class="titlebar">
			<span class="playlist-user">SampleUser's</span><br/>
			<span class="playlist-title">SamplePlay</span>
		</div>
		<div class="song-list">
		</div>
	</div>
	<div class="playbar">
		<svg class="playbar-btn prev" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 477.175 477.175" xml:space="preserve">
			<path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
		c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/>
		</svg>
		<div class="toggle-play">
			<svg version="1.1" class="playbar-btn play" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 41.999 41.999" xml:space="preserve">
				<path d="M36.068,20.176l-29-20C6.761-0.035,6.363-0.057,6.035,0.114C5.706,0.287,5.5,0.627,5.5,0.999v40
				c0,0.372,0.206,0.713,0.535,0.886c0.146,0.076,0.306,0.114,0.465,0.114c0.199,0,0.397-0.06,0.568-0.177l29-20
				c0.271-0.187,0.432-0.494,0.432-0.823S36.338,20.363,36.068,20.176z M7.5,39.095V2.904l26.239,18.096L7.5,39.095z"/>
			</svg>
			<svg version="1.1" class="playbar-btn pause hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 42 42" xml:space="preserve">
				<g>
					<path d="M14.5,0c-0.552,0-1,0.447-1,1v40c0,0.553,0.448,1,1,1s1-0.447,1-1V1C15.5,0.447,15.052,0,14.5,0z"/>
					<path d="M27.5,0c-0.552,0-1,0.447-1,1v40c0,0.553,0.448,1,1,1s1-0.447,1-1V1C28.5,0.447,28.052,0,27.5,0z"/>
				</g>
			</svg>
		</div>
		<svg class="playbar-btn next" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 477.175 477.175" xml:space="preserve">
			<g>
				<path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
						c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
						"/>
			</g>
		</svg>
		<div class="slider">
			<input min="0" max="100" value="0" step="any" class="slider" type="range">
		</div>
	</div>
<?php else: ?>
	<div class="navbar">
		<a href="http://localhost/Soundplay/">SoundPlay</a>
	</div>
	<div class="redirect">
		<h3 class="redirect-head">Not So Soon!!!</h3>
		<p class="redirect-text">Login First!</p>
		<button class="redirect-btn">Back Home</button>
	</div>
<?php endif; ?>
</body>
</html>

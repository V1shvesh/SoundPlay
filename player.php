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
	<script type="text/javascript" src="./js/howler.js"></script>
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/player.js"></script>
	<script type="text/javascript" src="./js/jsmediatags.js"></script>
</head>
<body>
	<div class="navbar">
		<a href="http://localhost/Soundplay/">SoundPlay</a>
		<div class="nav-buttons">
			<button class="navbtn">Log Out</button>	
		</div>
	</div>
	<div class="playlist">
		<div class="titlebar">
			<span class="playlist-user">SampleUser's</span><br/>
			<span class="playlist-title">SamplePlay</span>
		</div>
		<div class="song-list">
			<div class=song>
				<span class="song-title">Guillotine</span><br>
				<span class="song-details">Jon Bellion | The Human Condition</span>
				<span class="song-duration">2:30</span>
			</div>
			<div class=song>
				<span class="song-title">He Is The Same</span>
				<span class="song-details">Jon Bellion | The Human Condition</span>
				<span class="song-duration">2:30</span>
			</div>
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
			<svg class="playbar-btn" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 viewBox="0 0 59.999 59.999" xml:space="preserve">
				<path d="M59.923,41.618c-0.051-0.123-0.125-0.234-0.217-0.326l-7.999-7.999c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414
		l6.293,6.293H33c-6.065,0-11-4.935-11-11s4.935-11,11-11h23.586l-6.293,6.293c-0.391,0.391-0.391,1.023,0,1.414
		c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293l7.999-7.999c0.093-0.092,0.166-0.203,0.217-0.326
		c0.101-0.244,0.101-0.519,0-0.764c-0.051-0.123-0.125-0.234-0.217-0.326l-7.999-7.999c-0.391-0.391-1.023-0.391-1.414,0
		s-0.391,1.023,0,1.414l6.293,6.293H33c-5.4,0-10.039,3.311-12,8.008c-1.961-4.697-6.6-8.008-12-8.008H1c-0.553,0-1,0.447-1,1
		s0.447,1,1,1h8c6.065,0,11,4.935,11,11s-4.935,11-11,11H1c-0.553,0-1,0.447-1,1s0.447,1,1,1h8c5.4,0,10.039-3.311,12-8.008
		c1.961,4.697,6.6,8.008,12,8.008h23.586l-6.293,6.293c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293
		s0.512-0.098,0.707-0.293l7.999-7.999c0.093-0.092,0.166-0.203,0.217-0.326C60.024,42.137,60.024,41.862,59.923,41.618z"/>
	</svg>
	<svg class="playbar-btn" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 489.711 489.711" xml:space="preserve">
		<g>
				<path d="M112.156,97.111c72.3-65.4,180.5-66.4,253.8-6.7l-58.1,2.2c-7.5,0.3-13.3,6.5-13,14c0.3,7.3,6.3,13,13.5,13
					c0.2,0,0.3,0,0.5,0l89.2-3.3c7.3-0.3,13-6.2,13-13.5v-1c0-0.2,0-0.3,0-0.5v-0.1l0,0l-3.3-88.2c-0.3-7.5-6.6-13.3-14-13
					c-7.5,0.3-13.3,6.5-13,14l2.1,55.3c-36.3-29.7-81-46.9-128.8-49.3c-59.2-3-116.1,17.3-160,57.1c-60.4,54.7-86,137.9-66.8,217.1
					c1.5,6.2,7,10.3,13.1,10.3c1.1,0,2.1-0.1,3.2-0.4c7.2-1.8,11.7-9.1,9.9-16.3C36.656,218.211,59.056,145.111,112.156,97.111z"/>
				<path d="M462.456,195.511c-1.8-7.2-9.1-11.7-16.3-9.9c-7.2,1.8-11.7,9.1-9.9,16.3c16.9,69.6-5.6,142.7-58.7,190.7
					c-37.3,33.7-84.1,50.3-130.7,50.3c-44.5,0-88.9-15.1-124.7-44.9l58.8-5.3c7.4-0.7,12.9-7.2,12.2-14.7s-7.2-12.9-14.7-12.2l-88.9,8
					c-7.4,0.7-12.9,7.2-12.2,14.7l8,88.9c0.6,7,6.5,12.3,13.4,12.3c0.4,0,0.8,0,1.2-0.1c7.4-0.7,12.9-7.2,12.2-14.7l-4.8-54.1
					c36.3,29.4,80.8,46.5,128.3,48.9c3.8,0.2,7.6,0.3,11.3,0.3c55.1,0,107.5-20.2,148.7-57.4
					C456.056,357.911,481.656,274.811,462.456,195.511z"/>
		</g>
	</svg>
	</div>
</body>
</html>

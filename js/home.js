$(document).ready(function(){

	// DOM element identifiers
	var loginFormDiv = $('#login-form');
	var signupFormDiv = $('#signup-form');
	var loginForm = $('#login-form form');
	var signupForm = $('#signup-form form');
	var loginError = $('#login-error');
	var playlistMenu = $('#playlist-menu');
	var playlistList = $('.playlist-list')

	// Status and Request Variables
	var loginStatus = false;
	var signupStatus = false;
	var playlistStatus = false;
	var request = false;
	// Click Handlers
	$("#login-btn").click(function(event){
		event.preventDefault();
		if (loginStatus == false){
			if (signupStatus == true){
				signupFormDiv.fadeOut();
				signupStatus = false;
			}
			loginFormDiv.fadeIn();
			loginStatus = true;
		} else{
			loginFormDiv.fadeOut(300,function(){
				loginForm.trigger("reset");
				loginError.css("height","0");
				loginError.text("");
				loginStatus = false;
			});
		}
	});
	
	$("#signup-btn").click(function(event){
		event.preventDefault();
		if (signupStatus == false){
			if (loginStatus == true){
				loginFormDiv.fadeOut();
				loginStatus = false;
			}
			signupFormDiv.fadeIn();
			signupStatus = true;
		} else{
			signupFormDiv.fadeOut(function(){
				signupForm.trigger("reset");
			});
			signupStatus = false;
		}
	});

	$('#logout-btn').click(function(event){
		event.preventDefault();
		var values = "";
		if(request)
			request.abort();
		request = $.post('./php/logout.php', values, function(response){
			window.open(window.location.href, "_self");
		});
	});

	$('#upload-btn').click(function(){
		window.open(window.location.href + "upload.php", "_self");
	});

	// Submit Handlers
	loginForm.submit(function(event){
		event.preventDefault();
		var values = $(this).serialize(); //Form Data
		if(request)
			request.abort();
		request = $.post('./php/login.php', values, function(response){
			response = JSON.parse(response);
			console.log(response);
			if(response.error&&!response.loginStatus){
				loginError.text(response.error);
				loginError.css("height","30px");
			} else {
				loginError.css("height","0");
				loginError.text("");
				console.log("No data");
				window.open(window.location.href, "_self");
			}
		});
	});
	signupForm.submit(function(event){
		event.preventDefault();
		var values = $(this).serialize(); //Form Data
		if(request)
			request.abort();
		request = $.post('./php/signup.php', values, function(response){
			response = JSON.parse(response);
			console.log(response);
			if(response.error&&!response.signupStatus){
				console.log(response.error);
			} else {
				console.log("Made it");
				window.open(window.location.href, "_self");
			}
		});
	});
	// Whether playlist button exists or not
	if($('#playlist-btn').length>0){
		var values = "";
		var playlist = false;
		if(request)
			request.abort();
		request = $.post('./php/playlist_retrieve.php', values, function(response){
			response = JSON.parse(response);
			playlist = response.playlist;
			playlist.forEach(function(element){
				playlistList.append('<span class="playlist-entry" id="'+element.playlist_id+'">'+element.playlist_name+'</span>');
			});
		});
		playlistList.click(function(event){
			console.log(event);
			window.location = 'player.php?playlist_id=' + event.target.id + '&playlist_name=' + event.target.innerText;
		});
		$('#playlist-btn').click(function(event){
			event.preventDefault();
			if(!playlistStatus){
				playlistStatus = true;
				playlistMenu.fadeIn();
			} else {
				playlistStatus = false;
				playlistMenu.fadeOut();
			}
		});
	}
});

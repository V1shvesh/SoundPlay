$(document).ready(function(){

	// DOM element identifiers
	var loginFormDiv = $('#login-form');
	var signupFormDiv = $('#signup-form');
	var loginForm = $('#login-form form');
	var signupForm = $('#signup-form form');
	var loginError = $('#login-error');
	// loginError.hide();

	// Status and Request Variables
	var loginStatus = false;
	var signupStatus = false;
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

	// Work In Progress
	$('#playlist-btn').click(function(){
		// window.open(window.location.href + "player.php&playlist-id=", "_self"); 
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
		console.log("What??");
	});
	signupForm.submit(function(event){
		event.preventDefault();
		var values = $(this).serialize(); //Form Data
		if(request)
			request.abort();
		request = $.post('./php/signup.php', values, function(response){
			response = JSON.parse(response);
			console.log(response);
		});
	});
});

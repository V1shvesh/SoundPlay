$(document).ready(function(){
	var loginForm = $("#login-form");
	var signupForm = $("#signup-form");
	var loginStatus = false;
	var signupStatus = false;

	$("#login-btn-id").click(function(event){
		event.preventDefault();
		if (loginStatus == false){
			if (signupStatus == true){
				signupForm.fadeOut();
				signupStatus = false;
			}
			loginForm.fadeIn();
			loginStatus = true;
		} else{
			loginForm.fadeOut(300,function(){
				$('#login-form form').trigger("reset");
			});
			loginStatus = false;
		}
	});
	
	$("#signup-btn-id").click(function(event){
		event.preventDefault();
		if (signupStatus == false){
			if (loginStatus == true){
				loginForm.fadeOut();
				loginStatus = false;
			}
			signupForm.fadeIn();
			signupStatus = true;
		} else{
			signupForm.fadeOut(function(){
				$('#signup-form form').trigger("reset");
			});
			signupStatus = false;
		}
	});

});

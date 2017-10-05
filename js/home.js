$(document).ready(function(){
	var loginArrow = $("#login-arrow");
	var signupArrow = $("#signup-arrow");
	var loginForm = $("#login-form");
	var signupForm = $("#signup-form");
	var loginStatus = false;
	var signupStatus = false;

	$("#login-btn-id").click(function(event){
		event.preventDefault();
		if (loginStatus == false && signupStatus == false){
			loginArrow.fadeIn();
			loginForm.fadeIn();
			loginStatus = true;
		} else{
			loginArrow.fadeOut();
			loginForm.fadeOut();
			loginStatus = false;
		}
	});
	
	$("#signup-btn-id").click(function(event){
		event.preventDefault();
		if (signupStatus == false && loginStatus == false){
			signupArrow.fadeIn();
			signupForm.fadeIn();
			signupStatus = true;
		} else{
			signupArrow.fadeOut();
			signupForm.fadeOut();
			signupStatus = false;
		}
	});

});

// Slider Selector
var slider = ".slider>input[type='range']";

function createHowl(file){
	return new Howl({
		src:[file],
		preload: true,
	});
}

// Reset Slider on Reload
$(window).on('load', function(){
    $(slider).val(0);
});

$("document").ready(function(){
	// Player States
	var mouseflag = false;
	var seek=0;
	var last_val=0;

	// DOM Selectors
	var next = $('.next');
	var prev = $('.prev');

	// ID Index
	var id=0;
	var playlist = [];

	get_params = window.location.search.substr(1);
	
	// Playlist Creation
	$.post('./php/tracks_retrieve.php',get_params,function(response){
		response = JSON.parse(response);
		console.log(response);
		$('.playlist-user').text(response.username + "'s");
		$('.playlist-title').text(response.playlist_name);

	});
	var size = playlist.length;

	$('.song-list .song').click(function(e){
		this.addClass("selected");
	});

	function step(){
		last_val=$(slider).val();
		seek=playlist[id].seek()||0;
		$(slider).val((seek/playlist[id].duration()*100)||0);
		if(playlist[id].playing()){
			requestAnimationFrame(step);
		}
	}
	playlist.forEach(function(item){
		item.on("play",step);
		item.on("stop",function(){
				$(slider).val(0);
				$(".pause").removeClass("hide");
				$(".play").addClass("hide");
		});
		item.on("end",function(){
				$(slider).val(0);
				$(".play").removeClass("hide");
				$(".pause").addClass("hide");
				next.trigger("click");
				$('.play').trigger("click");
		});
	});

	$(".toggle-play").click(function(e){
		if(playlist[id].state()==="loaded")
			if(playlist[id].playing()){
				playlist[id].pause();
				$(".play").removeClass("hide");
				$(".pause").addClass("hide");
			} else {
				playlist[id].play();
				$(".pause").removeClass("hide");
				$(".play").addClass("hide");
			}
	});
	$(slider).mousedown(function(e){
		if(playlist[id].playing()){
			playlist[id].pause();
			mouseflag = true;
		}
		else{
			playlist[id].seek(($(slider).val()/100*playlist[id].duration())||0);
		}
	});
	$(slider).mouseup(function(e){
		console.log(e.target.value,last_val);
		if(!playlist[id].playing()&&mouseflag){
			playlist[id].seek((last_val/100*playlist[id].duration())||0);
			playlist[id].play();
			mouseflag=false;
		} else {
			playlist[id].seek((e.target.value/100*playlist[id].duration())||0);
		}
	});

	prev.click(function(){
		var play_state = playlist[id].playing();
		if(play_state){
			playlist[id].stop();
		}
		if(id==0){
			id+=size;
		}
		id--;
		$(slider).val(0);
		if(play_state)
			playlist[id].play();
	});

	next.click(function(){
		var play_state = playlist[id].playing();
		if(play_state){
			playlist[id].stop();
		}
		id=(id+1)%size;
		$(slider).val(0);
		last_val = 0;
		if(play_state)
			playlist[id].play();
	});
	$('.redirect-btn').click(function(){
		window.open('http://localhost/Soundplay/','_self')
	});
});

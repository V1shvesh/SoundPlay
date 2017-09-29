var slider = ".slider>input[type='range']";

$(window).on('load', function(){
    $(slider).val(0);
});
$("document").ready(function(){
	var mouseflag = false;
	var sound = new Howl({
		src:['sound.mp3'],
		preload: true,
		onstop:function(){
			$(slider).val(0);
			$(".toggle-play").removeClass("flipped");
		},
		onend:function(){
			$(slider).val(0);
			$(".toggle-play").removeClass("flipped");
		}
	});
	var seek=0;
	var prev;
	var id=0;
	function step(){
		prev=$(slider).val();
		seek=sound.seek()||0;
		$(slider).val((seek/sound.duration()*100)||0);
		if(sound.playing()){
			requestAnimationFrame(step);
		}
	}
	sound.on("play",step);
	$(slider).mousedown(function(e){
		if(sound.playing()){
			sound.pause();
			mouseflag = true;
		}
		else{
			sound.seek(($(slider).val()/100*sound.duration())||0);
		}
	});
	$(slider).mouseup(function(e){
		console.log(e.target.value,prev);
		sound.seek((prev/100*sound.duration())||0);
		if(!sound.playing()&&mouseflag){
			sound.play();
			mouseflag=false;
		};
	});
	sound.once('load', function(){
		$(".toggle-play").click(function(e){
			if(sound.playing()){
				sound.pause();
				$(".toggle-play").removeClass("flipped");
			} else {
				sound.play();
				$(".toggle-play").addClass("flipped");
			}
		});
	});
});


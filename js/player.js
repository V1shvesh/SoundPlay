var slider = ".slider>input[type='range']";

$(window).on('load', function(){
    $(slider).val(0);
});
$("document").ready(function(){
	var mouseflag = false;
	var sound = new Howl({
		src:['sound.mp3'],
		preload: true,
	});
	sound.on("stop",function(){
			$(slider).val(0);
			$(".pause").removeClass("hide");
			$(".play").addClass("hide");
	});
	sound.on("end",function(){
			$(slider).val(0);
			$(".play").removeClass("hide");
			$(".pause").addClass("hide");
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
				$(".play").removeClass("hide");
				$(".pause").addClass("hide");
			} else {
				sound.play();
				$(".pause").removeClass("hide");
				$(".play").addClass("hide");
			}
		});
	});
	var jsmt = window.jsmediatags;
	jsmediatags.read("/home/vishvesh/Git/SoundPlay/sound.mp3", {
  		onSuccess: function(tag) {
    	console.log(tag);
	  },
	  onError: function(error) {
	    console.log(error);
	  }
	});
});


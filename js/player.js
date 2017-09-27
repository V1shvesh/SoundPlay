$("document").ready(function(){
	var sound = new Howl({
		src:['sound.mp3'],
		preload: true
	});
	
	sound.once('load', function(){
		$(".toggle-play").click(function(e){
			$(".toggle-play").toggleClass("flipped");
			if(sound.playing())
				sound.pause();
			else{
				sound.play();
				$(".play")
			}
		});
	});
});


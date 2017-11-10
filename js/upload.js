$('document').ready(function(){
	var jsmediatags = window.jsmediatags;
	var fileInput = $('.upload-file');
	var fileUpload = $('.upload-file-trigger');
	var filePath = $('.filepath');
	$('.upload-form').trigger('reset');

	var title = $('.upload-form>input[name="title"]');
	var artist = $('.upload-form>input[name="artist"]');
	var album = $('.upload-form>input[name="album"]');
	var year = $('.upload-form>input[name="year"]');

	fileUpload.click(function( event ){
		title.val("");
		artist.val("");
		album.val("");
		year.val("");
		fileInput.blur();
	});
	fileInput.change(function( event ) {  
		filePath.val(event.target.files[0].name);
		$('.error').css("height","0");
		jsmediatags.read(event.target.files[0],{
			onSuccess: function(data){
				var tags = data.tags;
				if(tags.title) {
					title.val(tags.title);
				}
				if(tags.album) {
					album.val(tags.album);
				}
				if(tags.artist) {
					artist.val(tags.artist);
				}
				if(tags.year) {
					year.val(tags.year);
				}
			},
			onError: function (error) {
				$('.error').css("height","30px");
			}
		});
		fileInput.blur();
	});  
});
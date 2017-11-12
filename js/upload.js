$('document').ready(function(){
	var jsmediatags = window.jsmediatags;
	var uploadForm = $('.upload-form');
	var fileInput = $('.upload-file');
	var fileUpload = $('.upload-file-trigger');
	var filePath = $('.filepath');
	var playlistSelect = $('.upload-select select')
	var newPlaylistName = $('.new-playlist');

	uploadForm.trigger('reset');

	var title = $('.upload-form>input[name="title"]');
	var artist = $('.upload-form>input[name="artist"]');
	var album = $('.upload-form>input[name="album"]');
	var year = $('.upload-form>input[name="year"]');

	var playlist_request = $.post('./php/playlist_retrieve.php',function(response){
		response = JSON.parse(response);
		var playlist = response.playlist;
		playlist.forEach(function(element){
			playlistSelect.append('<option value="'+element.playlist_id+'">'+element.playlist_name+'</option>')
		});
		playlistSelect.append('<option value="new">New Playlist...</option>');
	});

	fileUpload.click(function( event ){
		title.val("");
		artist.val("");
		album.val("");
		year.val("");
		fileInput.blur();
	});
	fileUpload.mouseleave(function( event ){
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
	playlistSelect.change(function(){
		if(playlistSelect.val() === 'new'){
			newPlaylistName.fadeIn(300);
		} else {
			newPlaylistName.fadeOut(300);
		}
	});
	uploadForm.submit(function(){

	});
});
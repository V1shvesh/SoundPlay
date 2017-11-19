$('document').ready(function(){
	var jsmediatags = window.jsmediatags;
	var uploadForm = $('.upload-form');
	var fileInput = $('.upload-file');
	var fileUpload = $('.upload-file-trigger');
	var filePath = $('.filepath');
	var playlistSelect = $('.upload-select select')
	var newPlaylistNameDiv = $('.new-playlist');
	var newPlaylistNameInput = $('.new-playlist>input');

	// Status Variables
	var fileCheck = false;

	uploadForm.trigger('reset');

	var title = $('.upload-form>input[name="title"]');
	var artist = $('.upload-form>input[name="artist"]');
	var album = $('.upload-form>input[name="album"]');

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
		fileInput.blur();
	});
	$('#home').click(function(){
		window.open('http://localhost/Soundplay/','_self');
	});
	fileUpload.mouseleave(function( event ){
		fileInput.blur();
	});
	fileInput.change(function( event ) {  
		filePath.val(event.target.files[0].name);
		$('.error').css("height","0");
		$('.error').text("");
		$('body').remove('.file-success');
		$('body').remove('.file-error');
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
			fileCheck = true;
			},
			onError: function (error) {
				fileCheck = false;
				$('.error').css("height","30px");
				$('.error').text("Select a Valid File");
			}
		});
		fileInput.blur();
	});
	newPlaylistNameInput.change(function(){
		newPlaylistNameInput.val(newPlaylistNameInput.val().trim());
	});
	playlistSelect.change(function(){
		if(playlistSelect.val() === 'new'){
			newPlaylistNameDiv.fadeIn(300);
		} else {
			newPlaylistNameDiv.fadeOut(300);
		}
	});
	uploadForm.submit(function(event){
		if(!fileCheck){
			$('.error').css("height","30px");
			$('.error').text("Select a Valid File First!");
			return false;
		}
		if(playlistSelect.val() === ""){
			$('.error').css("height","30px");
			$('.error').text("Select a Playlist First!");
			return false;
		}
		if(playlistSelect.val() === "new"&&newPlaylistNameInput.val()===""){
			$('.error').css("height","30px");
			$('.error').text("Enter a Playlist Name First!");
			return false;
		}
		if(title.val() === ""){
			$('.error').css("height","30px");
			$('.error').text("Enter a Title First!");
			return false;
		}
		return true;
	});
});
function createPlaylist(files){	//files contains the data fetched from table Playlist
	var arr = [];
	var obj = {};
	var i = 0;
	files.forEach(function(song){
		// Assigning song's properties here
		obj.title = song.title;
		obj.artist = song.artist;
		obj.song = new Howl{
			src:[song.path],
			preload: true
		};
		arr[i] = obj;
	});
	return obj;
}
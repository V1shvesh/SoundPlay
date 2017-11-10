$('document').ready(function(){
	var fileInput = $('.upload-file');
	var fileUpload = $('.upload-file-trigger');
	var filePath = $('.filepath');
	fileUpload.click(function( event ){
		fileInput.focus();
	});
	fileInput.change(function( event ) {  
		filePath.val($(this).val());
		fileInput.blur();
	});  
});
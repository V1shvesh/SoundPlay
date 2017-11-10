$('document').ready(function(){
	var fileInput = $('.upload-file');
	var fileUpload = $('.upload-file-trigger');
	var filePath = $('.filepath');
	$('.upload-form').trigger('reset');
	fileUpload.click(function( event ){
		fileInput.blur();
	});
	fileInput.change(function( event ) {  
		filePath.val($(this).prop('files')[0].name);
		fileInput.blur();
	});  
});
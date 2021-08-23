var ajaxfile = "http://localhost/nomnom3/assets/summernote-0.8.2/summernote-upload.php";
var obj_upload_local = {
	onImageUpload: function(files, editor, $editable) {
		for (var i = files.length - 1; i >= 0; i--) {
			//console.log(files[i]);	//json file info
			sendFile(files[i], this);
		}
	}
}

//sendfile from local, dipanggil dari pform
function sendFile(file,el) {
	data = new FormData();
	data.append("file", file);
	$.ajax({
		url: ajaxfile,
		data: data,
		type: 'POST',
		cache: false, contentType: false, processData: false,
		/* Progress bar *
		xhr: function() {
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, true);
				return myXhr;
		},
		/* */
		success: function(balikan){
			if(balikan.trim().substr(0,5) == 'Error')
				alert(balikan);
			else
				$(el).summernote('editor.insertImage', balikan);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			window.alert(textStatus+" "+errorThrown);
		}
	});
	return false;
}
// update <progress></progress>
function progressHandlingFunction(e){
	if(e.lengthComputable){
		$('progress').attr({value:e.loaded, max:e.total});
		// reset progress on complete
		if (e.loaded == e.total) {
			$('progress').attr('value','0.0');
		}
	}
}
/* end summernote */

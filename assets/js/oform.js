var debug = false;
var ajaxfile = summernote_upload_file;
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
		url: ajaxfile,data: data,type: 'POST',cache: false, contentType: false, processData: false,
		/* Progress bar */
		xhr: function() {
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, true);
				return myXhr;
		},
		/* */
		success: function(balikan){
			if(balikan.trim().substr(0,5) == 'Error') alert(balikan);
			else $(el).summernote('editor.insertImage', balikan);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			window.alert(textStatus+" "+errorThrown);
		}
	});
	return false;
}

// update <progress></progress> - not yet used
function progressHandlingFunction(e){
	if(e.lengthComputable){
		$('progress').attr({value:e.loaded, max:e.total});
		// reset progress on complete
		if (e.loaded == e.total) {
			$('progress').attr('value','0.0');
		}
	}
}

$('.summernote').summernote(
	{
		//width:500,
		height: 200,
		placeholder: 'Tulis di sini ...',
		dialogsInBody: true,//airMode: true
		dialogsFade: true,
		callbacks: {
			//image from local
			onImageUpload: function(files, editor, $editable) {
				for (var i = files.length - 1; i >= 0; i--) {
					//console.log(files[i]);	//json file info
					sendFile(files[i], this);
				}
			}
		}
	}
);
  
$("#formModal").on('hidden.bs.modal', function(){
	$('.summernote').each(function( index ) {
	  $(this).summernote('destroy');
	});
});


$("#fdata").submit(function(){
	var data = $(this).serialize();
	//console.log(data);
	$.post(urlsave,{data: data},function(output){
		if(debug == true) console.log(output);
		var pesan = output.split("|");
		var stat = pesan[0].trim();
		var message = pesan[1];
		if(stat == "1"){
			swal('Report!',message,'success');
			$("#bshow").trigger('click');	//bshow trigger V_home
		}
		else
			swal('Report!',message,'error');
	});
	
	$('#formModal').modal('hide');
	
	return false;
});

$(".chosen").chosen({width: "100%", allow_single_deselect:true, max_selected_options: 5, no_results_text: "Oops, Data tidak ditemukan!"});



var debug = false;
showData();
var odisplay = {
	//autoWidth : true,
	scrollX: true,//scrollY: "400px",scrollCollapse: true,
	select: {
		style: 'os', //single || multiple = os
		selector: 'td:not(:first-child)'
	},
	responsive: true,
	dom: 'Bfltip',
	pageLength: 25,
	lengthMenu: [[10,25, 50, -1], [10,25, 50, "All"]],
	buttons: [
		{
			//fal far fas fab 
			text: '<i id="binput" class="fa fa-plus abcrud"></i>',
			titleAttr: 'Tambah Data',
			className: cinput,
			action: function ( e, dt, node, config ) {actioninput();}
		},{
			text: '<i id="bdeleteall" class="fa fa-trash-alt abcrud"></i>',
			titleAttr: 'Hapus Row Terpilih',
			className: cdeleteall,
			action: function ( e, dt, node, config ) {actiondeleteall();}
		},{
			text: '<i id="bshow" class="fa fa-redo"></i>',
			titleAttr: 'Load Data',
			action: function ( e, dt, node, config ) {showData();}
		},{
			extend: 'print',
			text: '<i class="fa fa-print"></i>',
			titleAttr: 'Print',
			className: cprint,
			//messageBottom: function () { return $('.well').html(); },
			exportOptions: {
				//columns: [':visible'],
				//orthogonal: 'export', //run type render in columns 
				format: {
					body: function (data, row, column, node ) {
						return column === 1 ? row+1 : "\0"+data.replace(/(<([^>]+)>)/gi, "");
					}
				},
			},
		},{
			extend: 'excelHtml5',
			titleAttr: 'Export to File',
			text: '<i class="far fa-file-excel"></i>',
			className: cexport,
			exportOptions: {
				format: {
					body: function (data, row, column, node ) {
						//console.log(row);
						//return "\0" + data.replace(/(<([^>]+)>)/gi, "");
						return column === 1 ? row+1 : "\0"+data.replace(/(<([^>]+)>)/gi, "");
					}
				},
			},
			title: '',
		}
	],
	//ajax: jsonf,
	columnDefs: [
		{
			targets: 0,className: 'nowrap', data: null,
			defaultContent: "<span id='edit' title='Edit' class = 'fas fa-user-edit blue abcrud "+ cedit +"'></span> <span id='delete' title='Hapus' class = 'fas fa-trash red abcrud "+ cdelete +"'></span> <span id='view' title='Lihat' class = 'fas fa-eye blue abcrud "+ cview +"'></span>",
			searchable: false, orderable: false,
		},{
			targets: 1,className: 'nomor', //render: function(data, type) { return data == '2' ? '<i class="fa fa-3 fa-check-circle-o datatable-paid-1"></i>' : '<i class="fa fa-3 fa-exclamation-circle datatable-paid-0"></i>';},
			//createdCell: function (td, cellData, rowData, rowIndex, col) {$(td).text(rowIndex+1);},
			searchable: false, orderable: false,
		}
	],
	//columns: [],
	//order: [[2, 'asc']],
}


function isJson(item) {
	item = typeof item !== "string" ? JSON.stringify(item) : item;
	try {
		item = JSON.parse(item);
	} catch (e) {
		return false;
	}
	if (typeof item === "object" && item !== null) {
		return true;
	}
	return false;
}

function showData(){
	$('#loadspinner').modal('show');
	//if($.fn.DataTable.isDataTable('#tdisplay')){$('#tdisplay').DataTable().destroy();}
	$.post(urlshowData,{},function(){async: true}).done(function(output){
		if(debug == true) console.log(output);
		if (isJson(output)){
			loaddata(output);
			$('#loadspinner').modal('hide');
		}
		else if (output == 0) swal('Report!','Data tidak ditemukan','error');
		else window.location.href =  urllogin; //load html redirect constructor
		
		/* auto increment number not orderedable or searchable */
		table.on('order.dt search.dt', function () {
			table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {cell.innerHTML = i+1;});
		}).draw();
		/**/
		
	}).fail(function(){});
}

//button input dan delete all di luar tbody
function actioninput(){
	$.post(urlshowForm,{aksi:"input", async: true},function(output){
		if(debug == true) console.log(output);
		if(output.includes("modal-dialog")) $('#formModal').modal('show').html(output);
		else if(output == "0") swal('Report!',"Aksi Input tidak diijinkan",'error');
		else window.location.href = urllogin;
	});
}

function actiondeleteall() {
	var ardata = table.rows('.selected').data().pluck(1).toArray();//column name undefined above, so index used
	//console.log(ardata);
	if(ardata.length > 0){
		swal({
		  title: "Apakah anda yakin?",
		  text: "Data yang dihapus tidak dapat dikembalikan!",
		  //type: 'warning',
		  //imageUrl: swalimgurl,
		  showCancelButton: true,
		  confirmButtonColor: '#d33',
		  cancelButtonColor: '#ccc',
		  confirmButtonText: 'Ya, Hapus!'
		}).then(function () {
			$('#loadspinner').modal('show');
			$.post(urldeleteAll,{ids: ardata, async: true},function(output){
				if(debug == true) console.log(output);
				var pesan = output.split("|");
				var stat = pesan[0].trim();
				var message = pesan[1];
				if(stat == "1"){
					swal('Report!',message,'success');
					//table.row(root).remove().draw(false);	//softrefresh
					$("#bshow").trigger('click');	//hardrefresh
				}
				else if(stat == "0")
					swal('Report!',message,'error');
				else 
					window.location.href = urllogin;
			});
		}).catch(swal.noop);
	}else{
		swal("Warning!","Pilih minimal satu row data!");
	}
}

//$div = $('#formModal').dialog({title: this.name,width: 400,height: 300});
//actiondb edit, view, dan delete single data dalam tbody
function actiondb(){
	var aksi = $(this).attr('id');
	if(aksi == 'edit' || aksi == 'view'){
		var root = $(this).closest('tr'); //tr id=''
		pg = table.page.info().page;
		pglen = table.page.len();
		idx = root.index()+ pg*pglen;
		var trdata = table.row( $(root) ).data();
		var id = trdata[1];
		$.post(urlshowForm,{aksi:aksi, id:id, async: true},function(output){
			if(debug == true) console.log(output);
			if(output.includes("modal-dialog")) $('#formModal').modal('show').html(output);
			else if(output == "0") swal('Report!',"Aksi "+aksi+" tidak dijinkan",'error');
			else window.location.href = urllogin;
		});
	}
	else if(aksi == 'delete'){
		var root = $(this).closest('tr');
		//var id = $(root).find('td:eq(1)').text();
		var trdata = table.row( $(root) ).data();
		var id = trdata[1];
		swal({
		  title: "Apakah anda yakin?",
		  text: "Data yang dihapus tidak dapat dikembalikan!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#d33',
		  cancelButtonColor: '#ccc',
		  confirmButtonText: 'Ya, Hapus!'
		}).then(function () {
			$.post(urldelete+"/"+id,{async: true},function(output){
				if(debug == true) console.log(output);
				var pesan = output.split("|");
				var stat = pesan[0].trim();
				var message = pesan[1];
				if(stat == "1"){
					swal('Report!',message,'success');
					//table.row(root).remove().draw(false);	//softrefresh
					$("#bshow").trigger('click');	//hardrefresh
				}
				else if(stat == "0")
					swal('Report!',message,'error');
				else 
					window.location.href = urllogin;
			});
		}).catch(swal.noop);
	}
}
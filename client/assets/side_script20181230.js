

var temp="";
localStorage.removeItem("count_verify");
$('form').submit(function(e){
	var form_type = $(this).attr('data-id');

	if (form_type == 'register') {
		var form = $('#registerform').serialize() + "&user_regis=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
				button.html("Tunggu Sebentar...");
			},
			success: function(data){
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".topalert","success",res,function(){
							location.href="#signin";
						});
					} else {
						learnalert(".topalert","error",res);
					}
				} else {
					learnalert(".topalert","error",res);
				}
				button.html("Daftar");
			},
			error: function(request, response, stat){
				//e.preventDefault();
				button.html("Daftar");
				button.prop("disabled",true);
				learnalert(".topalert","error",response);
			}
		});
	} else if (form_type == 'login') {
		var form = $(this).serialize() + "&user_login=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
				button.html("Tunggu Sebentar...");
			},
			success: function(data){
				////console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".topalert","success",res,function(){
							location.href="dashboard";
						});
					} else {
						learnalert(".topalert","error",res);
					}
				} else {
					learnalert(".topalert","error",res);
				}
				button.html("Masuk");
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").html("Masuk");
				$("button").prop("disabled",true);
				learnalert(".topalert","error",response);
				////console.log.log(request);
			}
		});
	} else if (form_type == 'form-agama') {
		var form = $(this).serialize() + "&form_agama=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="li_agama";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});
	} else if (form_type == 'form-try') {
		var form = $(this).serialize() + "&form_try=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="li_try";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});
	} else if (form_type == 'form-mapel'){
	    var form = $(this).serialize() + "&form_mapel=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="li_mapel";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});
	} else if (form_type == 'form-kelas'){
	    var form = $(this).serialize() + "&form_kelas=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				console.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="li_kelas";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				console.log(request);
			}
		});
	} else if (form_type == 'form-waktuujian'){
	    var form = $(this).serialize() + "&form_waktuujian=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="li_waktuujian";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});
	} else if (form_type == 'form-namaujian'){
	    var form = $(this).serialize() + "&form_namaujian=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							var id = $('input[name=id_namaujian').val();
							getdataujian(function(){
								tampilkan_daftarujian();
								go_menuujian(id);
							});
							
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});
	} else if (form_type == 'form-kelompok'){
	    var form = $(this).serialize() + "&form_kelompok=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="li_kelompok";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});
	} else if (form_type == 'form-server'){
	    var form = $(this).serialize() + "&form_server=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="li_server";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});
	} else if (form_type == 'form-siswa'){
	    var form = $(this).serialize() + "&form_siswa=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="li_peserta";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});	
	} else if (form_type == 'form-setprofil'){
	    var form = $(this).serialize() + "&form_setprofil=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res,function(){
							location.href="main_setting#company-profile";
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		});
	} else if (form_type == 'forget') {
		var form = $('#forgetform').serialize() + "&user_forgetpass=" + FORM_HASH;
		var button = $(this).find("button");
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
				button.html("Tunggu Sebentar...");
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".topalert","success",res,function(){
							location.href="#signin";
						});
					} else {
						learnalert(".topalert","error",res);
					}
				} else {
					learnalert(".topalert","error",res);
				}
				button.html("Verifikasi");
			},
			error: function(request, response, stat){
				//console.log.log(request);
				//e.preventDefault();
				button.html("Verifikasi");
				button.prop("disabled",true);
				learnalert(".topalert","error",response);
			}
		});
	} else if (form_type == 'form-resetpassword'){
		var password = $('#password').val();
		var repeatpassword = $('#repeatpassword').val();
		var md5check 	= $('#md5check').val();
		var button = $(this);
		if ( password == "" || repeatpassword == "" ) {
			learnalert(".topalert","error","Gagal, Password dan Ulangi Password masih Kosong",null,2500);
		} else {
			if ( password != repeatpassword ) {
				learnalert(".topalert","error","Gagal, Password dan Ulangi Password tidak sama",null,2500);
			} else {
				$.ajax({
				url : API,
				type : 'POST',
				dataType : 'JSON',
				cache : false,
				data : {
					password : password, repeatpassword: repeatpassword, md5check: md5check, reset_passworduser: FORM_HASH
				},
				timeout : 30000,
						beforeSend: function(){
							button.prop("disabled",true);
							button.html("Tunggu Sebentar...");
						},
						success: function(data){
							//console.log.log(data);
							var status = data.status, des = data.des, res = data.res, data = data.data;
							if (data !="" || data != null) {
								if (status == 1) {
									learnalert(".topalert","success",res,function(){
										location.href='./';							
									},2500);
								} else {
									learnalert(".topalert","error",res,null,2500);
								}
							} else {
								learnalert(".topalert","error",res,null,2500);
							}
							
						},
						error: function(request, response, stat){
							//e.preventDefault();
							button.html("Ubah Password");
							button.prop("disabled",true);
							learnalert(".topalert","error",response);
						}

			})
			}
		}
	}
	
	
	e.preventDefault();
});
var title_form = $('#title-Form').clone();

$('.printCardPeserta').on('click', function(){
	$('.table-data').slideUp(200,function(){
		$('.card-data').slideDown( function(){$(this).removeClass("none").removeAttr("style")});
	})
})

$('.addData').on("click",function(){
	$('.table-data').slideUp(200,function(){
		$('.form-data').slideDown( function(){$(this).removeClass("none").removeAttr("style")});
	})
	
});

$('.backData').on("click",function(){
	$('.form-data').slideUp(200,function(){
		$('.table-data').slideDown( function(){$(this).removeAttr("style");$('#title-Form').html(title_form);$("form")[0].reset();$('button[type=reset]').prop('disabled',false);$('input[type=hidden]').val("0")});
	});

});

$('.backDataSiswa').on("click",function(){
	$('.form-data').slideUp(200,function(){
		$('.table-data').slideDown( function(){$(this).removeAttr("style");$('#title-Form').html(title_form);$("form")[0].reset();$('.img-preview').attr('src',"image/assets/no_image.jpg");$('button[type=reset]').prop('disabled',false);});
	});

});
$('.showEditAgama').on("click",function(){
	$('#title-Form').html("Ubah Agama");
	var data = $(this).attr('value-id');
	var uID   = $(this).attr('data-id');

		data = _removeEchoID(data);
		data = JSON.parse(data);

	$('input[name=nama_agama').val(data.nama_agama);
	$('input[name=id_agama').val(uID);
	$('button[type=reset]').prop('disabled',true);

	$('.addData').click();	

});

$('.showEditkelas').on("click",function(){
	$('#title-Form').html("Ubah Kelas");
	var data = $(this).attr('value-id');
	var uID   = $(this).attr('data-id');

		data = _removeEchoID(data);
		data = JSON.parse(data);

	$('input[name=nama_kelas').val(data.nama_kelas);
	$('input[name=id_kelas').val(uID);
	$('button[type=reset]').prop('disabled',true);

	$('.addData').click();	

});

$('.showEditMapel').on("click",function(){
	$('#title-Form').html("Ubah Mapel");
	var data = $(this).attr('value-id');
	var uID   = $(this).attr('data-id');

		data = _removeEchoID(data);
		data = JSON.parse(data);

	$('input[name=nama_mapel').val(data.nama_mapel);
	$('input[name=id_mapel').val(uID);
	$('button[type=reset]').prop('disabled',true);

	$('.addData').click();	

});

$('.showEditWaktuUjian').on("click",function(){
	$('#title-Form').html("Ubah WaktuUjian");
	var data = $(this).attr('value-id');
	var uID   = $(this).attr('data-id');

		data = _removeEchoID(data);
		data = JSON.parse(data);

	$('input[name=waktuujian').val(data.waktu_ujian);
	$('input[name=id_waktuujian').val(uID);
	$('button[type=reset]').prop('disabled',true);

	$('.addData').click();	

});

$('.showEditNamaUjian').on("click",function(){
	$('#title-Form').html("Ubah NamaUjian");
	var namaujian = $(this).attr('value-id');
	var uID   = $(this).attr('data-id');
	$('input[name=nama_ujian').val(namaujian);
	$('input[name=id_namaujian').val(uID);
	$('button[type=reset]').prop('disabled',true);

	$('.addData').click();	

});

$('.showEditKelompok').on("click",function(){
	$('#title-Form').html("Ubah Kelompok");
	var data = $(this).attr('value-id');
	var uID   = $(this).attr('data-id');

		data = _removeEchoID(data);
		data = JSON.parse(data); 

	$('input[name=nama_kelompok').val(data.nama_kelompok);
	$('input[name=id_kelompok').val(uID);
	$('button[type=reset]').prop('disabled',true);

	$('.addData').click();	

});

$('.showEditSiswa').on("click",function(){
	$('#title-Form').html("Ubah Siswa");
	var enid = $(this).attr('data-id');
	var	id = _removeEchoID(enid);
	var input = $('.insiswa');

		input.each(function(){
			var data_id = $(this).attr('data-id');
				data_id = _removeEchoID(data_id);

			if ( data_id == id ) {
				var encodeval = $(this).val();
					encodeval = _removeEchoID(encodeval);
					encodeval = JSON.parse(encodeval);

				$('input[name=nama_peserta]').val(encodeval.nama);
				$('input[name=nopes]').val(encodeval.no_peserta);
				$('input[name=email_peserta]').val(encodeval.email);
				$('input[name=nohp_peserta]').val(encodeval.no_hp);
				$('input[name=id_siswa]').val(enid);

				if (encodeval.foto =="" || encodeval.foto == null) {
					$('.img-preview').attr('src',"image/assets/no_image.jpg");
				} else {
					$('.img-preview').attr('src',"image/public/"+encodeval.foto);
				}

				$('select[name=jk_peserta]').val(encodeval.jk);
				getSelectOption('agama_peserta',encodeval.agama)
				getSelectOption('kelompok_peserta',encodeval.kelompok)
				getSelectOption('paket_peserta',encodeval.paket)
				getSelectOption('server_peserta',encodeval.server)

			}
		})

	$('.addData').click();	
	$('button[type=reset]').prop('disabled',true);
});

$('.lockButton').on("click",function(){
    var enid = $(this).attr('data-id');
	var button = $(this);
	$.ajax({
		url : API,
		type : 'POST',
	    dataType : 'JSON',
		cache : false,
		data : {
		enid : enid, lockButton: FORM_HASH
			},
			timeout : 30000,
			beforeSend: function(){
			button.prop("disabled",true);
			button.html("Tunggu Sebentar...");
			},
			success: function(data){
	    	//console.log.log(data);
			var status = data.status, des = data.des, res = data.res, data = data.data;
			if (data !="" || data != null) {
				if (status == 1) {
					learnalert(".topalert","success",res,function(){
					location.reload();							
				},2500);
		    	} else {
					learnalert(".topalert","error",res);
				}
			} else {
			    learnalert(".topalert","error",res);
			}
						
		},
		error: function(request, response, stat){
			//e.preventDefault();
			button.html("Ubah Password");
			button.prop("disabled",true);
			learnalert(".topalert","error",response);
		}
	})
});

$('.restartButton').on("click",function(){
    var enid = $(this).attr('data-id');
	var button = $(this);
	$.ajax({
		url : API,
		type : 'POST',
	    dataType : 'JSON',
		cache : false,
		data : {
		enid : enid, restartButton: FORM_HASH
			},
			timeout : 30000,
			beforeSend: function(){
			button.prop("disabled",true);
			button.html("Tunggu Sebentar...");
			},
			success: function(data){
	    	//console.log.log(data);
			var status = data.status, des = data.des, res = data.res, data = data.data;
			if (data !="" || data != null) {
				if (status == 1) {
					learnalert(".topalert","success",res,function(){
					location.reload();							
				},2500);
		    	} else {
					learnalert(".topalert","error",res);
				}
			} else {
			    learnalert(".topalert","error",res);
			}
						
		},
		error: function(request, response, stat){
			//e.preventDefault();
			button.html("Ubah Password");
			button.prop("disabled",true);
			learnalert(".topalert","error",response);
		}
	})
});

 $('.deleteButton').on("click", function() {
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, deleteButton :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
});

$('.deletedatakelas').on("click", function() {
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, del_list_kelas :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
});

$('.deletedataAgama').on("click", function() {
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, del_list_agama :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
});


$('.deletedataMapel').on("click", function(){
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, del_list_mapel :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });

});

$('.deletedataWaktuujian').on("click", function(){
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, del_list_waktuujian :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
 });
 
$('.deletedataNamaujian').on("click", function(){
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, del_list_namaujian :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
 });
 
 
 $('.deletedataKelompok').on("click", function() {
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, del_list_kelompok :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
});

 $('.deletedataServer').on("click", function() {
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, del_list_server :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
});

 $('.deletedataSiswa').on("click", function() {
    var thiss =$(this);
    $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data ini?", function(data){
        var close = thiss.closest("tr");
        var dataid = thiss.attr('data-id');
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataid: dataid, del_list_siswa :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						close.slideUp(function(){
                            redraw().fnDeleteRow( close, null, true ); 
                            updateIndex();
                        });
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
});


 
 
 
 
 $('.deleteSelected').on('click', function(){
        var dataid = $(this).attr('data-id');
     $.learnpopup('warning',"Apakah Anda yakin ingin menghapus data yang dipilih ini?, data yang dihapus tidak dapat dikembalikan lagi", function(data){
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      dataselected: temp,
			      ondata: dataid,
			      del_selected :FORM_HASH  
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
					    $('.deleteSelected').fadeOut();
						deleteSelectedrows(temp)
                        learnalert(".learntopnotif","success",res);
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				//console.log.log(request);
			}
		})
    });
 });
 
 //CHECK BOX
 
 $('#main_checkbox').on("change", function(){
     var main_checkbox = $(this);
         temp = temp.split(",");
     var parrent_checkbox = $('.parrent_checkbox');
     if ( main_checkbox.is(":checked") ) {
          
          parrent_checkbox.each(function(elm) {
                $(this).prop("checked", true);
                hilangkan(temp,$(this).attr('data-id'));
                temp.push($(this).attr('data-id'));
          })
          temp = cleanArray(temp).join(",");
          DisplayDeletSelected(temp);
     } else {
         parrent_checkbox.each(function(index) {
                $(this).prop("checked", false);
          })
          temp ="";
          DisplayDeletSelected(temp);
     }
});

$('.parrent_checkbox').on("change", function(){
    var parrent_checkbox = $(this);
    var lengt_check = $('.parrent_checkbox').length;
        temp = temp.split(",");
      
    var dataid = parrent_checkbox.attr('data-id');
    if ( parrent_checkbox.is(":checked") ) {
          temp.push(dataid);
          temp = cleanArray(temp);
          var lengt_temp = temp.length  
          ////console.log.log(temp)
          temp = temp.join(",");
          if ( lengt_temp == lengt_check){
              $('#check_list_agama').prop("checked", true);
          }
          
          DisplayDeletSelected(temp);
     } else {
         temp = hilangkan(temp,dataid);
         temp = cleanArray(temp).join(",");
         $('#check_list_agama').prop("checked", false);
         
         DisplayDeletSelected(temp);
     }
})


$('#logo-id').on('change', function(){
	var value = this.value.substring(12);
	$('#fakeUploadLogo').val(value);
	readURL(this);
})

$('#useremail_verify').on('click', function(){
	var button = $(this);
	$.ajax({
		url : API,
		type : 'POST',
		dataType : 'JSON',
		timeout : 30000,
		cache : false,
		data : {
			verification_email : FORM_HASH
		}, beforeSend: function(){
				button.prop("disabled",true);
				button.html("Tunggu Sebentar...");
			},
			success: function(data){
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".topalert","success",res,function(){
							button.prop("disabled",true);
							updatestate_verify(button,function(time){

								if ( time == 0 ) {
									button.prop("disabled",false);
									button.html("Verifikasi Email");
								} else {
									button.html("Kirim Ulang "+time);
								}
								
							});
							
						});
					} else {
						learnalert(".topalert","error",res);
					}
				} else {
					learnalert(".topalert","error",res);
				}
				
			},
			error: function(request, response, stat){
				//e.preventDefault();
				button.html("Daftar");
				button.prop("disabled",true);
				learnalert(".topalert","error",response);
			}
	})

})

$('#useremail_update').on("click", function(){
	var time = localStorage.getItem("count_verify");
	var divalert = $('.topalert');
	if ( time > 0 ) {
		var alert = "<div class='alert alert-danger'><center>Update Email gagal, Proses Verifikasi Email sedang berlangsung</center></div>";
		divalert.hide().html(alert).slideDown(200).delay(3000).slideUp();
	} else {

		var input_email_user = $('#email_user');

		if ( input_email_user.is(':disabled') ) {
			input_email_user.prop('disabled',false);
		} else {
			var email_user = input_email_user.val();
			var button = $(this);
			$.ajax({
				url : API,
				type : 'POST',
				dataType : 'JSON',
				cache : false,
				data :
				{
					email_user: email_user, changeemail_user : FORM_HASH
				},
				timeout: 30000,
				beforeSend: function(){
					button.prop("disabled",true);
					button.html("Tunggu Sebentar...");
				},
				success: function(data){
					//console.log.log(data);
					var status = data.status, des = data.des, res = data.res, data = data.data;
					if (data !="" || data != null) {
						if (status == 1) {
							learnalert(".topalert","success",res,function(){
								location.reload();							
							});
						} else {
							learnalert(".topalert","error",res);
						}
					} else {
						learnalert(".topalert","error",res);
					}
					
				},
				error: function(request, response, stat){
					//e.preventDefault();
					button.html("Update Email");
					button.prop("disabled",true);
					learnalert(".topalert","error",response);
				}

			})
		}
			
	}
})

$('#username_update').on("click", function(){
	var username = $('#nama_user').val();
	var button = $(this);
	$.ajax({
		url : API,
		type : 'POST',
		dataType : 'JSON',
		cache : false,
		data : {
			username : username, updateusername_user: FORM_HASH
		},
		timeout : 30000,
				beforeSend: function(){
					button.prop("disabled",true);
					button.html("Tunggu Sebentar...");
				},
				success: function(data){
					//console.log.log(data);
					var status = data.status, des = data.des, res = data.res, data = data.data;
					if (data !="" || data != null) {
						if (status == 1) {
							learnalert(".topalert","success",res,function(){
								location.reload();							
							});
						} else {
							learnalert(".topalert","error",res);
						}
					} else {
						learnalert(".topalert","error",res);
					}
					
				},
				error: function(request, response, stat){
					//e.preventDefault();
					button.html("Update Nama");
					button.prop("disabled",true);
					learnalert(".topalert","error",response);
				}

	})
});

$('#change_passworduser').on('click', function(){
	var password = $('#password').val();
	var repeatpassword = $('#repeatpassword').val();
	var button = $(this);
	if ( password == "" || repeatpassword == "" ) {
		learnalert(".topalert","error","Gagal, Password dan Ulangi Password masih Kosong",null,2500);
	} else {
		if ( password != repeatpassword ) {
			learnalert(".topalert","error","Gagal, Password dan Ulangi Password tidak sama",null,2500);
		} else {
			$.ajax({
			url : API,
			type : 'POST',
			dataType : 'JSON',
			cache : false,
			data : {
				password : password, repeatpassword: repeatpassword, change_passworduser: FORM_HASH
			},
			timeout : 30000,
					beforeSend: function(){
						button.prop("disabled",true);
						button.html("Tunggu Sebentar...");
					},
					success: function(data){
						//console.log.log(data);
						var status = data.status, des = data.des, res = data.res, data = data.data;
						if (data !="" || data != null) {
							if (status == 1) {
								learnalert(".topalert","success",res,function(){
									location.reload();							
								});
							} else {
								learnalert(".topalert","error",res);
							}
						} else {
							learnalert(".topalert","error",res);
						}
						
					},
					error: function(request, response, stat){
						//e.preventDefault();
						button.html("Ubah Password");
						button.prop("disabled",true);
						learnalert(".topalert","error",response);
					}

		})
		}
	}
})

$('.reset_pass').on('click', function(){
	$('#login').slideUp(function(){
		$('.animate.form').hide();
		$('#forgeted').slideDown();
	})
})

$('.to_signin').on('click', function(){
	$('#forgeted').slideUp(function(){
		$('.animate.form').show();
		$('#login').slideDown();
	});
})


$('.getinfopeserta').on('click', function(){
	var enid = $(this).attr('data-id');
	var	id = _removeEchoID(enid);
	var input = $('.insiswa');
	var parrent_tr = $(this).closest('tr');
	var total_td  = parrent_tr.children('td').length;
	var trappend = '',classtr = $('.'+enid);

	if ( classtr.length > 0 ) {
		classtr.remove();
	} else {
		input.each(function(index,val){
			var data_id = $(this).attr('data-id');
				data_id = _removeEchoID(data_id);

				if ( data_id == id ) {
					var encodeval = $(this).val();
						encodeval = _removeEchoID(encodeval);
						encodeval = JSON.parse(encodeval);


						if ( encodeval.foto == "" || encodeval.foto == null ) {
							if ( encodeval.jk == "L" ) {
								var image = "image/assets/learn_laki_user.png";
							} else if ( encodeval.jk == "P" ) {
								var image = "image/assets/learn_wanita_user.png";
							} else {
								var image = "image/assets/no_image.png";
							}
						} else {
							var image = "image/public/"+encodeval.foto;
						}

					trappend += ' <tr class="'+enid+'"> '
							  + '  <td  colspan="'+total_td+'"> '
							  + '    <div class="infobox"> <div class="topalert"></div><br>'
							  + '		<div class="infoinline"> '
							  +	'			<div class="infoitem_image"> '
							  +	'				<div class="infoval"><img src="'+image+'"></div> '
							  + '			</div> '
							  +	'			<div class="infoitem"> '
							  +	'				<div class="infoname">Nomor Peserta</div> '
							  +	'				<div class="infoval">: '+encodeval.no_peserta+'</div> '
							  + '			</div> '
							  +	'			<div class="infoitem"> '
							  +	'				<div class="infoname">Nama</div> '
							  +	'				<div class="infoval">: '+encodeval.nama+'</div> '
							  + '			</div> '
							  +	'			<div class="infoitem"> '
							  +	'				<div class="infoname">Email</div> '
							  +	'				<div class="infoval">: '+encodeval.email+'</div> '
							  + '			</div> '
							  +	'			<div class="infoitem"> '
							  +	'				<div class="infoname">No hp</div> '
							  +	'				<div class="infoval">: '+encodeval.no_hp+'</div> '
							  + '			</div> '
							  +	'			<div class="infoitem"> '
							  +	'				<div class="infoname">Kata Sandi</div> '
							  +	'				<div class="infoval">: '+encodeval.pass_view+' &nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-warning btn-sm regeneratepassPeserta" data-id="'+enid+'">Reset Password</button></div> '
							  + '			</div> '
							  + '		</div> '
							  + '	 </div> '
							  + '  </td> '
							  + ' </tr>';

					parrent_tr.after(trappend).next().hide().fadeIn(500,function(){

						$('.regeneratepassPeserta').on('click', function(){
							var enid = $(this).attr('data-id');
							var button = $(this);
							$.ajax({
									url : API,
									type : 'POST',
									dataType : 'JSON',
									cache : false,
									data : {
										enid : enid, regeneratepassPeserta: FORM_HASH
									},
									timeout : 30000,
											beforeSend: function(){
												button.prop("disabled",true);
												button.html("Tunggu Sebentar...");
											},
											success: function(data){
												//console.log.log(data);
												var status = data.status, des = data.des, res = data.res, data = data.data;
												if (data !="" || data != null) {
													if (status == 1) {
														learnalert(".topalert","success",res,function(){
															location.reload();							
														},2500);
													} else {
														learnalert(".topalert","error",res);
													}
												} else {
													learnalert(".topalert","error",res);
												}
												
											},
											error: function(request, response, stat){
												//e.preventDefault();
												button.html("Ubah Password");
												button.prop("disabled",true);
												learnalert(".topalert","error",response);
											}

								})
						})

					});

				}
		})
	}		
})

//CARD PREVIEW

 $('input:radio[name=cardLayout]').on('ifChecked',function(){
 	var type = $(this).val();
 	var cardBox = $('.cardBox');
 	if ( type == 'potrait' ) {
 		cardBox.css({
 			'width' : '11cm',
 			'height' : '8cm'
 		})
 	} else {
 		cardBox.css({
 			'width' : '11cm',
 			'height' : '13cm'
 		})
 	}
})

 $('.flat').each(function(){
 	
 	let type,
 		name,
 		attr,
 		val,
 		flat=$(this),cardBox = $('.cardBox'),layout;

 		type = flat.attr('type');
 		
 		if ( type == 'checkbox' ) {
 			flat.on('ifChecked',function(){
 				name = $(this).attr('name');
 				if (name == 'showmapel' ){
 					$('#cardMapelAbsen').fadeIn();
 				} else if ( name == 'showmapelabsensi' ){
 					$('.absen').fadeIn()
 				} else if ( name == 'showkelompok' ){
 					$('#cardKelompok').fadeIn();
 				} else if ( name == 'showagama' ){
 					$('#cardAgama').fadeIn();
 				} else if ( name == 'showjk' ){
 					$('#cardJK').fadeIn();
 				} else if ( name == 'showttd' ){
 					$('#cardTTD').fadeIn();
 				} else if ( name == 'showfoto' ){
 					$('#cardFoto').fadeIn();
 				}
 			})
 			flat.on('ifUnchecked',function(){
 				name = $(this).attr('name');
 				if ( name == 'showmapel' ){
 					$('#cardMapelAbsen').fadeOut();
 				} else if ( name == 'showmapelabsensi' ){
 					$('.absen').fadeOut()
 				} else if ( name == 'showkelompok' ){
 					$('#cardKelompok').fadeOut();
 				} else if ( name == 'showagama' ){
 					$('#cardAgama').fadeOut();
 				} else if ( name == 'showjk' ){
 					$('#cardJK').fadeOut();
 				} else if ( name == 'showttd' ){
 					$('#cardTTD').fadeOut();
 				} else if ( name == 'showfoto' ){
 					$('#cardFoto').fadeOut();
 				}
 			})
 		} else if ( type == 'number' ) {
 			flat.keyup(function(){
 				val = $(this).val();
 				attr = $(this).attr('data-id');
 				if ( attr == 'panjang-kartu') {
 					layout = $('input:radio[name=cardLayout]:checked');
 					layout = $(layout).val();
 					
 					if ( val == "" || val == 0 || val == '0') {
 						if ( layout == 'potrait') {
 							cardBox.css({
			 					'width' : '11cm'
			 				});
 						} else {
 							cardBox.css({
			 					'width' : '11cm'
			 				});
 						}
 					} else {
 						cardBox.css({
		 					'width' : val+'cm'
		 				});
 					}
 					
	 					
 				} else if ( attr == 'lebar-kartu'){
 					layout = $('input:radio[name=cardLayout]:checked');
 					layout = $(layout).val();
 					
 					if ( val == "" || val == 0 || val == '0') {
 						if ( layout == 'potrait') {
 							cardBox.css({
			 					'height' : '8cm'
			 				});
 						} else {
 							cardBox.css({
			 					'height' : '13cm'
			 				});
 						}
 					} else {
 						cardBox.css({
		 					'height' : val+'cm'
		 				});
 					}
	 			}

 			})
 		}
 })

/*$('.textarea').each(function(){
	let attr,val, area=$(this), cardhead = $('.cardHead'), cardfooter = $('.cardFooter');
        area.keyup(function(){
            val = $(this);
  			attr = area.attr('data-id');

  			if ( attr == 'judul-kartu') {
  				 cardfooter.html(val);
  			}
  			//console.log.log(val)
        })


		
})*/
$('.textarea').each(function(){
	var id = this.id;
	let attr,val, cardhead = $('.cardHead'), cardfooter = $('.cardFooter');
	var editor = textboxio.replace( '#'+id );
	// Get the editor container element
	

	editor.events.change.addListener(function () {
		var element = editor.element();
		var element = $(element).attr('aria-label');
			element = element.replace(/\s/g,'');
			element = element.split('-');
			element = element[1];

			if ( element == 'text1' ) {
				var content = editor.content.get();
				$('#text1').val(content);
				cardhead.html(content);
			} else if ( element == 'text2' ) {
				var content = editor.content.get();
				$('#text2').val(content);
				cardfooter.html(content);
			}
	});
})

  
$('#change_card').on('click', function(){
	var judulkartu = findValinput('judulkartu').val();
	var kakikartu = findValinput('kakikartu').val();
	var cardLayout = findValinput('cardLayout');
		cardLayout = get_RadioSelectedByArray(cardLayout);
	var showmapel = findValinput('showmapel');
		if(empty($(showmapel))) { showmapel = 0} else {showmapel=$(showmapel).val()}
	var showmapelabsensi = findValinput('showmapelabsensi');
		if(empty($(showmapelabsensi))) { showmapelabsensi = 0} else {showmapelabsensi=$(showmapelabsensi).val()}
	var showfoto = findValinput('showfoto');
		if(empty($(showfoto))) { showfoto = 0} else {showfoto=$(showfoto).val()}
	var showttd = findValinput('showttd');
		if(empty($(showttd))) { showttd = 0} else {showttd=$(showttd).val()}
	var showkelompok = findValinput('showkelompok');
		if(empty($(showkelompok))) { showkelompok = 0} else {showkelompok=$(showkelompok).val()}
	var showagama = findValinput('showagama');
		if(empty($(showagama))) { showagama = 0} else {showagama=$(showagama).val()}
	var showjk = findValinput('showjk');
		if(empty($(showjk))) { showjk = 0} else {showjk=$(showjk).val()}
	var panjangkartu = findValinput('panjangkartu').val();
	var lebarkartu = findValinput('lebarkartu').val();
	var idkartu = findValinput('idkartu').val();

    var form = {
    					judulkartu : judulkartu,
						kakikartu : kakikartu,
						cardLayout : cardLayout,
						showmapel : showmapel,
						showmapelabsensi : showmapelabsensi,
						showfoto : showfoto,
						showttd : showttd,
						showkelompok : showkelompok,
						showagama : showagama,
						showjk : showjk,
						panjangkartu : panjangkartu,
						lebarkartu : lebarkartu,
						idkartu : idkartu,
						setcard : FORM_HASH
				};

	var button = $(this);
	var html = button.html();
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: form,
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				button.prop("disabled",true);
				button.html("Tunggu Sebentar...");
			},
			success: function(data){
				//console.log.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".topalert","success",res,function(){
							location.reload();
						});
					} else {
						learnalert(".topalert","error",res);
					}
				} else {
					learnalert(".topalert","error",res);
				}
				button.html(html);
			},
			error: function(request, response, stat){
				//console.log.log(request);
				//e.preventDefault();
				button.html(html);
				learnalert(".topalert","error",response);
			}
		});

});

$('.card-new').on('click', function() {

	$.learnpopup('warning',"Lanjutkan membuat Data Ujian baru", function(data){
		let data_ujian = localStorage.getItem(storage_temp);
		$.ajax({
			url : API,
			type: "POST",
			dataType: "JSON",
			data: {
			      data:data_ujian, add_new_dataujian :FORM_HASH
			},
			cache: false,
			timeout: 30000,
			beforeSend: function(){
				
			},
			success: function(data){
				console.log(data);
				var status = data.status, des = data.des, res = data.res, data = data.data;
				if (data !="" || data != null) {
					if (status == 1) {
						learnalert(".learntopnotif","success",res);
						getdatanamaujian(function(){
							tampilkan_listdatanamaujian();
							$('input[type=button],button').mouseup(function() { this.blur() })
                    		dom_listdatanamaujian();
						});
					} else {
						learnalert(".learntopnotif","error",res);
					}
				} else {
					learnalert(".learntopnotif","error",res);
				}
			},
			error: function(request, response, stat){
				//e.preventDefault();
				$("button").prop("disabled",true);
				learnalert(".learntopnotif","error",response);
				console.log(request);
			}
		})
    });
});


var interval = setInterval(function(){
	if (FORM_HASH == null || FORM_HASH == "" || FORM_HASH == "undefined") {
      
	} else {
		clearInterval(interval);
		
			getdataujian(function(){
				tampilkan_daftarujian();
				$('input[type=button],button').mouseup(function() { this.blur() })
			});
		
	}
},500)




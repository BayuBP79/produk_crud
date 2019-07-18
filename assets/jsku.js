$(function(){


$('.addData').on("click",function(){
	$('.table-data').slideUp(200,function(){
		$('.form-data').slideDown( function(){$(this).removeClass("none").removeAttr("style")});
	})
	
});
$('.backDataSiswa').on("click",function(){
	$('.form-data').slideUp(200,function(){
		$('.table-data').slideDown( function(){$(this).removeAttr("style");$('#title-Form').html(title_form);$("form")[0].reset();$('.img-preview').attr('src',"image/assets/no_image.jpg");$('button[type=reset]').prop('disabled',false);});
	});
});

	$('.hapusKaryawan').on("click",  function(){		
		var nk = $(this).data('data-id');
		$("#hapus").attr("href","hapus.php?nk='+nk+'");
	});


	$('.hapusKaryawan').on("click",  function(e){		
		console.log($(this).data('data-id'));
	});

	});
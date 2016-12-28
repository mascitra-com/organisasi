$(document).ready(function(){
	$('#title-name').keyup(function () {
		var max = 50;
		var len = $(this).val().length;
		if (len >= max) {
			$('#title-msg').removeClass('text-success');
			$('#title-msg').addClass('text-danger');
			$('#title-msg').text(' jumlah kata sudah maksimal');
		} else {
			var char = max-len;
			$('#title-msg').removeClass('text-danger');
			$('#title-msg').addClass('text-success');
			$('#title-msg').text(char + ' karakter tersisa');
		}
	});

	tinymce.init({ selector:'.tinymce' });
});

$('#name').keypress(function(e) {
	if(e.which == 13) {
		search_news();
	}
});

function update_type(id, no, name){
	$.ajax({
		url: "news/update_news_type",
		type: "POST",
		data: {'id':id},
		dataType: "JSON",
		success: function(data)
		{
			if (data.status == "active") {
				$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sukses! </strong>Berita " + name+" berhasil diaktifkan.</div>");
				$("#news-trigger"+no).empty();
				$("#news-trigger"+no).append("aktif");
				$("#news-trigger"+no).removeClass("btn-danger");
				$("#news-trigger"+no).addClass("btn-primary");
			}else{
				$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sukses! </strong>Berita " + name+" berhasil di non aktifkan.</div>");
				$("#news-trigger"+no).empty();
				$("#news-trigger"+no).append("tidak aktif");
				$("#news-trigger"+no).removeClass("btn-primary");
				$("#news-trigger"+no).addClass("btn-danger");
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Terjadi kesalahan dalam memperbaharui status berita.</div>");
		}
	});
}

function all_news() {
	$("#news-list").empty();
	$('#news-list').append("<p class='col-xs-12 text-center'><i class='fa fa-refresh fa-spin'></i> Mengambil berita</p>")
	$.getJSON(site_url+'/homepage/get_all_news', function(result){
		$("#news-list").empty();
		for(var i = 0; i < result.length; i++) {
			var obj = result[i];
			$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'><a href=homepage/news_article/"+obj.slug+"><div class='thumbnail'><img class='img-fit' src='"+base_url+'assets/img/news_img/'+obj.img_link+"' alt='thumbnail' width='100%'><div class='caption'><h5>"+obj.name+"</h5></div></div></a></div>");
		}
	});
}

function latest_news() {
	$("#news-list").empty();
	$('#news-list').append("<p class='col-xs-12 text-center'><i class='fa fa-refresh fa-spin'></i> Mengambil berita</p>")
	$.getJSON(site_url+'/homepage/get_latest_news', function(result){
		$("#news-list").empty();
		for(var i = 0; i < result.length; i++) {
			var obj = result[i];
			$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'><a href=homepage/news_article/"+obj.slug+"><div class='thumbnail'><img class='img-fit' src='"+base_url+'assets/img/news_img/'+obj.img_link+"' alt='thumbnail' width='100%'><div class='caption'><h5>"+obj.name+"</h5></div></div></a></div>");
		}
	});
}

function popular_news() {
	$("#news-list").empty();
	$('#news-list').append("<p class='col-xs-12 text-center'><i class='fa fa-refresh fa-spin'></i> Mengambil berita</p>")
	$.getJSON(site_url+'/homepage/get_popular_news', function(result){
		$("#news-list").empty();
		for(var i = 0; i < result.length; i++) {
			var obj = result[i];
			$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'><a href=homepage/news_article/"+obj.slug+"><div class='thumbnail'><img class='img-fit' src='"+base_url+'assets/img/news_img/'+obj.img_link+"' alt='thumbnail' width='100%'><div class='caption'><h5>"+obj.name+"</h5></div></div></a></div>");
		}
	});
}

function search_news() {
	$("#news-list").empty();
	$('#news-list').append("<p class='col-xs-12 text-center'><i class='fa fa-refresh fa-spin'></i> Mengambil berita</p>")
	$.ajax({
		url: site_url+'/homepage/get_searched_news',
		type: "POST",
		data: {'name':$('#name').val()},
		dataType: "JSON",
		success: function(data)
		{
			if (data.artikel == undefined) {
				$("#news-list").empty();
				$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'>Berita tidak ditemukan</div>");
			}else{
				$("#news-list").empty();
				for(var i = 0; i < data.artikel.length; i++) {
					var obj = data.artikel[i];
					$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'><a href=homepage/news_article/"+obj.slug+"><div class='thumbnail'><img class='img-fit' src='"+base_url+'assets/img/news_img/'+obj.img_link+"' alt='thumbnail' width='100%'><div class='caption'><h5>"+obj.name+"</h5></div></div></a></div>");
				}
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Terjadi kesalahan dalam memperbaharui status berita.</div>");
		}
	});
}
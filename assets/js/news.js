$(document).ready(function(){
	tinymce.init({ selector:'.tinymce' });
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

	$.ajax({
		url: "homepage/get_all_news",
		type: "POST",
		dataType: "JSON",
		success: function(data)
		{
			for(var i = 0; i < data.artikel.length; i++) {
				var obj = data.artikel[i];
				$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'><a href=homepage/news_article/"+obj.slug+"><div class='thumbnail'><img class='img-fit' src='"+obj.img_link+"' alt='thumbnail' width='100%'><div class='caption'><h5>"+obj.name+"</h5></div></div></a></div>");
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Terjadi kesalahan dalam memperbaharui status berita.</div>");
		}
	});
}

function latest_news() {
	$("#news-list").empty();

	$.ajax({
		url: "homepage/get_latest_news",
		type: "POST",
		dataType: "JSON",
		success: function(data)
		{
			for(var i = 0; i < data.artikel.length; i++) {
				var obj = data.artikel[i];
				$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'><a href=homepage/news_article/"+obj.slug+"><div class='thumbnail'><img class='img-fit' src='"+obj.img_link+"' alt='thumbnail' width='100%'><div class='caption'><h5>"+obj.name+"</h5></div></div></a></div>");
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Terjadi kesalahan dalam memperbaharui status berita.</div>");
		}
	});
}

function popular_news() {
	alert('still in progress');
}

function search_news() {
	$("#news-list").empty();
	$.ajax({
		url: "homepage/get_searched_news",
		type: "POST",
		data: {'name':$('#name').val()},
		dataType: "JSON",
		success: function(data)
		{
			if (data.artikel == undefined) {
				$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'>Berita tidak ditemukan</div>");
			}else{
				for(var i = 0; i < data.artikel.length; i++) {
					var obj = data.artikel[i];
					$("#news-list").append("<div class='col-xs-12 col-sm-4 col-md-3'><a href=homepage/news_article/"+obj.slug+"><div class='thumbnail'><img class='img-fit' src='"+obj.img_link+"' alt='thumbnail' width='100%'><div class='caption'><h5>"+obj.name+"</h5></div></div></a></div>");
				}
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Terjadi kesalahan dalam memperbaharui status berita.</div>");
		}
	});
}
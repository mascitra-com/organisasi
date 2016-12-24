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
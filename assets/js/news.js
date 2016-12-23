$(document).ready(function(){
	tinymce.init({ selector:'.tinymce' });

// 	 // $("#title-name").keyup(function(){
// 	 //        $("#title-msg").append("a");
// 	 //    });
// 	 //    $("#title-name").keydown(function(){
// 	 //        $("#title-msg").append("b");
// 	 //    });
});

// $("#news-trigger").click(function(){
// 	if ($("#news-trigger").text() == "aktif") {
// 		$("#news-trigger").empty();
// 		$("#news-trigger").append("tidak aktif");
// 		$("#news-trigger").removeClass("btn-primary");
// 		$("#news-trigger").addClass("btn-danger");
// 	}else if($("#news-trigger").text() == "tidak aktif"){
// 		$("#news-trigger").empty();
// 		$("#news-trigger").append("aktif");
// 		$("#news-trigger").removeClass("btn-danger");
// 		$("#news-trigger").addClass("btn-primary");
// 	}
// });

function update_type(id){
	$.ajax({
		url: "news/update_news_type",
		type: "POST",
		data: {'id':id},
		dataType: "JSON",
		success: function(data)
		{
			if (data.status == "active") {
				$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sukses! </strong>Status Berita berhasil diperbaharui.</div>");
				$("#news-trigger").empty();
				$("#news-trigger").append("aktif");
				$("#news-trigger").removeClass("btn-danger");
				$("#news-trigger").addClass("btn-primary");
			}else{
				$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gaga! </strong>Status Berita tidak berhasil diperbaharui.</div>");
				$("#news-trigger").empty();
				$("#news-trigger").append("tidak aktif");
				$("#news-trigger").removeClass("btn-primary");
				$("#news-trigger").addClass("btn-danger");
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Terjadi kesalahan dalam memperbaharui status berita.</div>");
		}
	});
}
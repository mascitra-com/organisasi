$(document).ready(function () {
	tinymce.init({selector: '.tinymce'});
});

function change_pos_profile(id,type) {
	$.ajax({
		url: site_url+"/profile/update_pos()",
		type: "POST",
		data: {'id':id, 'type':type},
		dataType: "JSON",
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Tidak berhasil mengubah posisi menu Profil.</div>");
		}
	});
}
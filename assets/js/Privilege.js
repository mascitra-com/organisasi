function get_privilege(id) {
	$.ajax({
		url: "../cek_privilege",
		type: "POST",
		data: {'id_groups':$('#id_groups').val(), 'id_menu':id},
		dataType: "JSON",
		success: function(data)
		{
			if (data.status) {
				delete_privilege(id);
				$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sukses! </strong>Hak Akses berhasil dihapus.</div>");
			}else{
				add_privilege(id);
				$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sukses! </strong>Hak akses berhasil ditambahkan.</div>");
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Terjadi kesalahan dalam pengecekan hak akses.</div>");
		}
	});
}

function add_privilege(id) {
	$.ajax({
		url: "../store",
		type: "POST",
		data: {'id_groups':$('#id_groups').val(), 'id_menu':id},
		dataType: "JSON",
		error: function (jqXHR, textStatus, errorThrown) 
		{
			$("body").append("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Hak akses gagal ditambahkan.</div>");
		}
	});
}

function delete_privilege(id) {
        $.ajax({
            url : "../destroy",
            type: "POST",
            data: {'id_groups':$('#id_groups').val(), 'id_menu':id},
            dataType: "JSON",
            error: function (jqXHR, textStatus, errorThrown)
            {
				$("body").append("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal! </strong>Hak akses gagal dihapus.</div>");
            }
        });
 }
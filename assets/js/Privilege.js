function get_privilege(id) {
	console.log("masuk fungsi get_privilege");
	$.ajax({
		url: "../cek_privilege",
		type: "POST",
		data: {'id_groups':$('#id_groups').val(), 'id_menu':id},
		dataType: "JSON",
		success: function(data)
		{
			if (data.status) {
				console.log("Hapus Privilege jika data sudah ada");
				alert('Sukses mengecek Privilege');
				delete_privilege(id);
			}else{
				add_privilege(id);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			alert('Terjadi kesalahan mengecek Privilege');
		}
	});
}

function add_privilege(id) {
	console.log("masuk fungsi add");
	$.ajax({
		url: "../store",
		type: "POST",
		data: {'id_groups':$('#id_groups').val(), 'id_menu':id},
		dataType: "JSON",
		success: function(data)
		{
			console.log(data);
			if (data.status) {
				alert('Sukses menambah Privilege');
			}else{
				console.log("b");
			}
		},
		error: function (jqXHR, textStatus, errorThrown) 
		{
			alert('Terjadi kesalahan menambah Privilege');
		}
	});
}

function delete_privilege(id) {
		console.log("masuk fungsi delete");
        $.ajax({
            url : "../destroy",
            type: "POST",
            data: {'id_groups':$('#id_groups').val(), 'id_menu':id},
            dataType: "JSON",
            success: function(data)
            {
            	if (data.status) {
					alert('Sukses menghapus Privilege');
				}else{
					console.log("Gagal menghapus Privilege");
				}
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Terjadi kesalahan menghapus Privilege');
            }
        });
 }
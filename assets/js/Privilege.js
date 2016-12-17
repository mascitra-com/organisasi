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
	$.ajax({
		url: "../store",
		type: "POST",
		data: {'id_groups':$('#id_groups').val(), 'id_menu':id},
		dataType: "JSON",
		error: function (jqXHR, textStatus, errorThrown) 
		{
			alert('Terjadi kesalahan menambah Privilege');
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
                alert('Terjadi kesalahan menghapus Privilege');
            }
        });
 }
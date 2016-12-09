function coba() {
    alert('Fvck');
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
        $.ajax({
            url : "<?php echo site_url('privilege/destroy')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                alert('Sukses menghapus Privilege');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Terjadi kesalahan menghapus Privilege');
            }
        });
 }
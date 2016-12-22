$(document).ready(function () {
    tinymce.init({selector: '.tinymce'});
});

Dropzone.options.dropzone = {
    acceptedFiles: 'image/gif, image/png, image/jpg, image/jpeg'
};

$('#select_all').click(function() {
    if(this.checked) {
        console.log('checked');
        $(".checkbox").prop('checked', true);
    } else {
        console.log('unchecked');
        $(".checkbox").prop('checked', false);
    }
});

var id;
function detail(photo_id) {
    id = photo_id.substring(6, photo_id.length);
    var id_link = 'link-' + id;
    var source = document.getElementById(photo_id).getAttribute('src');
    var link = document.getElementById(id_link).getAttribute('value');
    $("#photo").attr('src', source);
    $(".photo_link").attr('href', link);
    $("#detailModal").modal();
    console.log(id);
}

function next() {
    id++;
    var photo_id = 'photo-' + id;
    var id_link = 'link-' + id;
    try {
        var source = document.getElementById(photo_id).getAttribute('src');
        var link = document.getElementById(id_link).getAttribute('value');
    } catch (e) {
        id--;
    }
    $("#photo").attr('src', source);
    $(".photo_link").attr('href', link);
    $("#detailModal").modal();
    console.log(id);
}

function prev() {
    id--;
    var photo_id = 'photo-' + id;
    var id_link = 'link-' + id;
    try {
        var source = document.getElementById(photo_id).getAttribute('src');
        var link = document.getElementById(id_link).getAttribute('value');
    } catch (e) {
        id++;
    }
    $("#photo").attr('src', source);
    $(".photo_link").attr('href', link);
    $("#detailModal").modal();
    console.log(id);
}
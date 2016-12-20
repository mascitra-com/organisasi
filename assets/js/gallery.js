var link = window.location.href;

$(document).ready(function () {
    tinymce.init({selector: '.tinymce'});
});

Dropzone.options.dropzone = {
    acceptedFiles: 'image/gif, image/png, image/jpg, image/jpeg'
}

$('#page').change(function (e) {
    var total = $("#page").val();
    link = replace_link(/per_page=[0-9]{1,}/i, 'per_page=' + total);
    window.location = link;
})

function replace_link(data, dengan) {
    lnk = link;
    if (data.test(lnk)) {
        lnk = lnk.replace(data, dengan);
    } else {
        if (/show[^A-Za-z0-9]/i.test(lnk)) {
            lnk = lnk + '&' + dengan;
        } else {
            lnk = lnk + '?' + dengan;
        }
    }
    return lnk;
}
$(document).ready(function () {
    tinymce.init({selector: '.tinymce'});
});

Dropzone.options.dropzone = {
    acceptedFiles: 'image/gif, image/png, image/jpg, image/jpeg'
}
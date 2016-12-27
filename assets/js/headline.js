$(function () {
    $("#headline").autocomplete({
        minLength:0,
        delay:0,
        source: title,
    });
});
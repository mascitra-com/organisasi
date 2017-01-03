var link = window.location.href;

$(document).ready(function(){
    $(".pengumuman").marquee({direction:'left',duration:17000,duplicated:true});
});

$('#page').change(function (e) {
    var total = $("#page").val();
    link = replace_link(/per_page=[0-9]{1,}/i, 'per_page=' + total);
    link = replace_link(/number=[0-9]{1,}/i, 'number=0');
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
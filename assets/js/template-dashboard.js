$(document).ready(function(){
	$('[data-toggle="offcanvas"]').click(function(){
		$("#side-nav").toggleClass('hidden-xs');
	});
});

$("a[href*='collapse']").click(function(){
	if ($(this).find('i:last').hasClass('fa-angle-down')) 
	{
		$(this).find('i:last').removeClass('fa-angle-down').addClass('fa-angle-up');
	}
	else
	{
		$(this).find('i:last').removeClass('fa-angle-up').addClass('fa-angle-down');
	}
});
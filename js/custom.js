$('.etabs li a').click(function(){
	var bg_img=$(this).attr('data-img');
	$(".services-wrap").css("background-image", "url(" + bg_img + ")");
});
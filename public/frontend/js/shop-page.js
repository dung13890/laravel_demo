
$(document).ready(function () {

	$(window).scroll(function(){
		if ($(this).scrollTop()>70) {
			$('.back-top').fadeIn();
		} else {
			$('.back-top').fadeOut();
		}
	});

	//$("#zoom-image").magnify();

	 $("#zoom-image").elevateZoom({
	 	zoomType	: "lens", 
	 	lensShape : "round",
	    lensSize : 200,
	    containLensZoom : true,

	 });

	  $(".product-thumbs-image a").bind("click", function(e) { 
	  	var ez = $("#zoom-image").data('elevateZoom');	
	  	var image = $(this).attr('data-image');
	  	 ez.swaptheimage(image,image);
	  	return false;
	  });

	   $("input[name='quantity']").TouchSpin();

});
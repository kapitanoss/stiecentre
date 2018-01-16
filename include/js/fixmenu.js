		/*$("button").click(function(){
		var s = $("#temp").scrollTop();
		console.log("scrollTop = " + s);
		$(window).scroll(function() {
		sw = $(window).scrollTop();
		console.log("scrollTopWindows = " + sw);
		});
		});*/
/*------ fixed menu main and left -----*/		
jQuery("document").ready(function($){
		var isAdded = false;
		$(window).scroll(function() {
			/*sw = $(window).scrollTop();
			console.log("0=scrollTopWindows = " + sw);*/
		  if (($(window).scrollTop() > 195)&& !isAdded) {
			/*sw = $(window).scrollTop();
			console.log("1=scrollTopWindows = " + sw);*/
			$('.nav').addClass('nav_fixed');
			$('.hdr').css('margin-bottom', '24px');
			$('.havleft').css('margin-top', '22px');
			$('.havleft').addClass('nav_fixed_left');
			isAdded = true;
		  }
		  else if (($(window).scrollTop() <= 195)&& isAdded) {
			/*sw = $(window).scrollTop();
			console.log("2=scrollTopWindows = " + sw);*/ 
			$('.nav').removeClass('nav_fixed');
			$('.hdr').css('margin-bottom', '0');
			$('.havleft').css('margin-top', '0');	
			$('.havleft').removeClass('nav_fixed_left');
			isAdded = false;
		  }
		});
});		
/*------ fixed menu main and left -----*/	
jQuery(window).load(function() {
    jQuery('.home_slider, .home_slidernews').each(function() {
        var this_element = jQuery(this);
        var sliderSpeed = 800,
            sliderTimeout = parseInt(this_element.attr('data-interval'))*1000,
            sliderFx = this_element.attr('data-flex_fx'),
			smoothHeight = this_element.attr('data-smoothHeight')==1 ? true : false,
            slideshow = true;
        if ( sliderTimeout == 0 ) slideshow = false;

        this_element.flexslider({
            animation: sliderFx,
            slideshow: slideshow,
            slideshowSpeed: sliderTimeout,
            sliderSpeed: sliderSpeed,
            smoothHeight: smoothHeight,
			controlNav: false,
			prevText: '<i class="icon-left-open-big"><</i>',        
			nextText: '<i class="icon-right-open-big">></i>' 
			
        });
    });

});
$(".marquee").simplyScroll();

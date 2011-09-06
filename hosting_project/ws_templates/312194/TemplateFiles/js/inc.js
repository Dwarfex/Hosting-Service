$(function(){
		 
		   $('#navigation li a').append('<span class="hover"></span>');
           // span whose opacity will animate when mouse hovers.
		   
		   $('#navigation li a').hover(
             function() {
	         $('.hover', this).stop().animate({
			'opacity': 1
			}, 700,'easeOutSine')
        	},
            function() {
	       $('.hover', this).stop().animate({
			'opacity': 0
			}, 700, 'easeOutQuad')
	
	})
});
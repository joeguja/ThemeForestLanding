// jQuery for Bravia
jQuery(document).ready(function($) {
	
// Diapo Slider ------------------------------------------------------ //
	$('.pix_diapo').diapo(); //slide the class pix_diapo
	
// Poshy Tips ------------------------------------------------------ //
	$('.form-poshytip').poshytip({ // class form-poshytip is the class for sign up form
				className: 'tip-darkgray',
				showOn: 'focus',
				alignTo: 'target',
				alignX: 'right',
				alignY: 'center',
				offsetX: 5
			});
	$('.form-poshytip2').poshytip({ // class form-poshytip2 is the class for subscribe form
				className: 'tip-darkgray',
				showOn: 'focus',
				alignTo: 'target',
				alignX: 'center',
				offsetX: 5
			});		

//JQuery Pretty Photo ---------------------------------- //
		$("area[rel^='prettyPhoto']").prettyPhoto();
		
		$("ul.recentWork:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:3000, autoplay_slideshow: false});
						$("ul.recentWork:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
				
						$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
							custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
							changepicturecallback: function(){ initialize(); }
						});
		
						$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
							custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
							changepicturecallback: function(){ _bsap.exec(); }
						});

// Testimonial Cycle ------------------------------------------------------ // 
        $('#testimonial').cycle({ 
            fx:    'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
            speed:  4000  // speed of transitions effects
         });

// Testimonial Cycle ------------------------------------------------------ // 
		$('#to-top').click(function(){
			$.scrollTo( {top:'0px', left:'0px'}, 1500 );
		});

//close			
});
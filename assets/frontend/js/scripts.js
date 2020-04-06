
window.mr = window.mr || {};

mr = (function (mr, $, window, document){
    "use strict";

    mr = mr || {};

    var components = {documentReady: [],documentReadyDeferred: [], windowLoad: [], windowLoadDeferred: []};

    mr.status = {documentReadyRan: false, windowLoadPending: false};

    $(document).ready(documentReady);
    $(window).on("load", windowLoad);

    function documentReady(context){
        
        context = typeof context === typeof undefined ? $ : context;
        components.documentReady.concat(components.documentReadyDeferred).forEach(function(component){
            component(context);
        });
        mr.status.documentReadyRan = true;
        if(mr.status.windowLoadPending){
            windowLoad(mr.setContext());
        }
    }

    function windowLoad(context){
        if(mr.status.documentReadyRan){
            mr.status.windowLoadPending = false;
            context = typeof context === "object" ? $ : context;
            components.windowLoad.concat(components.windowLoadDeferred).forEach(function(component){
               component(context);
            });
        }else{
            mr.status.windowLoadPending = true;
        }
    }

    mr.setContext = function (contextSelector){
        var context = $;
        if(typeof contextSelector !== typeof undefined){
            return function(selector){
                return $(contextSelector).find(selector);
            };
        }
        return context;
    };

    mr.components    = components;
    mr.documentReady = documentReady;
    mr.windowLoad    = windowLoad;

    return mr;
}(window.mr, jQuery, window, document));



//////////////// Flickity
mr = (function (mr, $, window, document){
    "use strict";
    
    mr.sliders = mr.sliders || {};

    mr.sliders.documentReady = function($){

        $('.slider').each(function(index){
            
            var slider = $(this);
            var sliderInitializer = slider.find('ul.slides');
            sliderInitializer.find('>li').addClass('slide');
            var childnum = sliderInitializer.find('li').length;
            
            var themeDefaults = {
                cellSelector: '.slide',
                cellAlign: 'left',
                wrapAround: true,
                pageDots: false,
                prevNextButtons: false,
                autoPlay: true,
                draggable: (childnum < 2 ? false: true),
                imagesLoaded: true,
                accessibility: true,
                rightToLeft: false,
                initialIndex: 0,
                freeScroll: false
            }; 

            // Attribute Overrides - options that are overridden by data attributes on the slider element
            var ao = {};
            ao.pageDots = (slider.attr('data-paging') === 'true' && sliderInitializer.find('li').length > 1) ? true : undefined;
            ao.prevNextButtons = slider.attr('data-arrows') === 'true'? true: undefined;
            ao.draggable = slider.attr('data-draggable') === 'false'? false : undefined;
            ao.autoPlay = slider.attr('data-autoplay') === 'false'? false: (slider.attr('data-timing') ? parseInt(slider.attr('data-timing'), 10): undefined);
            ao.accessibility = slider.attr('data-accessibility') === 'false'? false : undefined;
            ao.rightToLeft = slider.attr('data-rtl') === 'true'? true : undefined;
            ao.initialIndex = slider.attr('data-initial') ? parseInt(slider.attr('data-initial'), 10) : undefined;
            ao.freeScroll = slider.attr('data-freescroll') === "true" ? true: undefined;

            // Set data attribute to inidicate the number of children in the slider
            slider.attr('data-children',childnum);

            
            $(this).data('sliderOptions', jQuery.extend({}, themeDefaults, mr.sliders.options, ao));

            $(sliderInitializer).flickity($(this).data('sliderOptions'));

            $(sliderInitializer).on( 'scroll.flickity', function( event, progress ) {
              if(slider.find('.is-selected').hasClass('controls--dark')){
                slider.addClass('controls--dark');
              }else{
                slider.removeClass('controls--dark'); 
              }
            });
        });

        if(mr.parallax.update){ mr.parallax.update(); }
        
    };

    mr.components.documentReadyDeferred.push(mr.sliders.documentReady);
    return mr;

}(mr, jQuery, window, document));

//////////////// Wizard

mr = (function (mr, $, window, document){

    "use strict";

    

    mr.wizard = mr.wizard || {};



	  mr.wizard.documentReady = function($){



			$('.wizard').each(function(){

				var wizard = jQuery(this), themeDefaults = {};

 

        themeDefaults = {

					headerTag: "h5",

				  bodyTag: "section",

					transitionEffect: "slideLeft",

					autoFocus: true

				}      

				



				if(!wizard.is('[role="application"][id^="steps-uid"]')){  	

						wizard.steps(jQuery.extend({}, themeDefaults, mr.wizard.options));

		

		   	    wizard.addClass('active');

		    }

				

		  });

		};



	  mr.components.documentReady.push(mr.wizard.documentReady);

	  return mr;



}(mr, jQuery, window, document));
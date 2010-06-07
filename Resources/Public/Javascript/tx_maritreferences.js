function initImageLightboxes(){
	if($('.lightboximage').length > 0){
		$('.lightboximage').tooltip({ 
		    delay: 1000, 
		    showURL: false, 
		    fade: 250,
	    	top: -15, 
	    	left: 15,
		    bodyHandler: function() { 
		        return $("<img/>").attr("src", $('#'+this.id+"_big").attr('src')); 
		    } 
		});
	}
}

function doAjaxPageBrowser(element){	
	flobuReferenceList.enable();
	
	$.ajax({
		type: 'GET',
		url: element.attr("href")+'&type=1267717411',
		success: function(responseText, statusText, xhr) {     
			$('#maritReferences').replaceWith(responseText);
			flobuReferenceList.disable();
			initImageLightboxes();
		}
  });

	return false;
}

function initImageAccordion(){
	if($('.imageAccordion')){
		$('div.imageItems').each(function(){
			//Get highest element height
			if($(this).height()>imageItemsFullHeight) {
				imageItemsFullHeight = $(this).height();
			}
			$(this).height(imageItemsCollapsedHeight);
		});
		//set all elements to the same height
		$('div.imageItems div.imageItemsInnerWrap').height(imageItemsFullHeight); 
		$('div.imageItems').first().height(imageItemsFullHeight); 
		$('.imageAccordion').height($('.imageAccordion').height());
		var boxes = $('div.imageItems')
			.mouseover(
				function(){
					$(this)
						.stop(true)
						.animate({syncHeight: imageItemsFullHeight}, 
								{
									syncElements: boxes, 
									fullHeight: $('.imageAccordion').height(),
									easing: 'easeOutBounce'
								});
				}
			);
	}
}

function initDoublebox(){	

	if($('#maritReferencesDoublebox').length > 0){
	
		flobuReferenceDoublebox = new flower_bubble ({
			base_obj: $('#maritReferencesDoublebox'),
			block_mode: 'base_obj',
			base_dir: 'typo3conf/ext/marit_references/Resources/Public/Javascript',
			background: { css: 'white', opacity: 0.78 },
			bubble: { image: 'bubble.png', width: 130, height: 98 },
			flower: { image: 'flower.gif', width: 32, height: 32 }
		});
		
		flobuReferenceDoublebox.enable();
		
		$.ajax({
			type: 'GET',
			url: $('#doubleboxLink').attr("href")+'&type=1267717411&no_cache=1',
			success: function(responseText, statusText, xhr) {     
				$('#maritReferencesDoublebox').replaceWith(responseText);
				flobuReferenceDoublebox.disable();
			}
	  });
	}
	
	return false;
	
}

function initContextbox(){	

	if($('#maritReferencesContextbox').length > 0){
	
		flobuReferenceContextbox = new flower_bubble ({
			base_obj: $('#maritReferencesContextbox'),
			block_mode: 'base_obj',
			base_dir: 'typo3conf/ext/marit_references/Resources/Public/Javascript',
			background: { css: 'white', opacity: 0.78 },
			bubble: { image: 'bubble.png', width: 130, height: 98 },
			flower: { image: 'flower.gif', width: 32, height: 32 }
		});
		
		flobuReferenceContextbox.enable();
		
		$.ajax({
			type: 'GET',
			url: $('#contextboxLink').attr("href")+'&type=1267717411&no_cache=1',
			success: function(responseText, statusText, xhr) {     
				$('#maritReferencesContextbox').replaceWith(responseText);
				flobuReferenceContextbox.disable();
			}
	  });
	}
	
	return false;
	
}

$.fx.step.syncHeight = function(fx){
    if (!fx.state) {
        var o = fx.options;
        fx.start = $(fx.elem).height();
        fx.syncStart = [];
        fx.fullHeight = o.fullHeight;
 
        fx.syncElements = $(o.syncElements)
            .map(function(i, elem){
                if(elem !== fx.elem){
                    return elem;
                }
            })
            .each(function(i){
                fx.syncStart.push($(this).height());
            });
 
        fx.syncEnd = (fx.fullHeight - fx.end) / fx.syncElements.length;
    }
    if(fx.syncElements){
	    var syncedHeight = 0;
	    fx.syncElements
	        .each(function(i){
	            var height = Math.round(fx.pos * (fx.syncEnd - fx.syncStart[i]) + fx.syncStart[i]);
	            syncedHeight += height;
	            this.style.height = height + fx.unit;
	        });
	 
	    fx.elem.style.height = fx.fullHeight - syncedHeight + fx.unit;
    }
};

var flobuReferenceList;
var imageItemsFullHeight = 0;
var imageItemsCollapsedHeight = 35;

$(document).ready(function(){
	initImageLightboxes();
	initImageAccordion();
	initDoublebox();
	initContextbox();
	
	flobuReferenceList = new flower_bubble ({
		base_obj: $('.wrapper'),
		block_mode: 'base_obj',
		base_dir: 'typo3conf/ext/marit_references/Resources/Public/Javascript',
		background: { css: 'white', opacity: 0.78 },
		bubble: { image: 'bubble.png', width: 130, height: 98 },
		flower: { image: 'flower.gif', width: 32, height: 32 }
	});

	
});
function initImageLightboxes(){
	$('.lightboximage').tooltip({ 
	    delay: 500, 
	    showURL: false, 
	    fade: 250,
    	top: -15, 
    	left: 15,
	    bodyHandler: function() { 
	        return $("<img/>").attr("src", $('#'+this.id+"_big").attr('src')); 
	    } 
	});
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

var flobuReferenceList;

$(document).ready(function(){
	initImageLightboxes();

	flobuReferenceList = new flower_bubble ({
		base_obj: $('.wrapper'),
		block_mode: 'base_obj',
		base_dir: 'typo3conf/ext/marit_references/Resources/Public/Javascript',
		background: { css: 'white', opacity: 0.78 },
		bubble: { image: 'bubble.png', width: 130, height: 98 },
		flower: { image: 'flower.gif', width: 32, height: 32 }
	});
});
function initImageLightboxes(){
	$('.lightboximage').hover(function(event){
			if(!$('#'+event.currentTarget.id+"_big").is(':visible')){
				var offsetTarget = $(this).offset();
				$('#'+event.currentTarget.id+"_big").css('display', 'block');
				$('#'+event.currentTarget.id+"_big").css('position', 'absolute');
				$('#'+event.currentTarget.id+"_big").css('top', (offsetTarget.top-25)+'px');
				$('#'+event.currentTarget.id+"_big").css('left', (offsetTarget.left-50)+'px');		
			}
		}, function(event){
			$('#'+event.currentTarget.id+"_big").css('display', 'none');
		});
}

function initAjaxPageBrowser(){	
	ajaxFlobuReferenceList = new flower_bubble ({
		base_obj: $('#maritReferences'),
		block_mode: 'base_obj',
		base_dir: 'typo3conf/ext/marit_references/Resources/Public/Javascript',
		background: { css: 'white', opacity: 0.78 },
		bubble: { image: 'bubble.png', width: 130, height: 98 },
		flower: { image: 'flower.gif', width: 32, height: 32 }
	});
}

function doAjaxPageBrowser(element){
	//$('#maritReferences').fadeOut('fast');
	ajaxFlobuReferenceList.enable();
	
	$.ajax({
		type: 'GET',
		url: element.attr("href")+'&type=1267717411',
		success: function(responseText, statusText, xhr) {     
			$('#maritReferences #projectListWrap').replaceWith($(responseText).find('#projectListWrap'));
			//$('#maritReferences').fadeIn('fast');
			ajaxFlobuReferenceList.disable();
		}
  });

	return false;
}

var ajaxFlobuReferenceList;

$(document).ready(function(){
	initImageLightboxes();
	initAjaxPageBrowser();
});
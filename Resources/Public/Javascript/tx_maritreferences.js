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

function doAjaxPageBrowser(element){
	$('#maritReferences').fadeOut('fast');
	
	$.ajax({
		type: 'GET',
		url: element.attr("href")+'&type=1267717411',
		success: function(responseText, statusText, xhr) {     
			$('#maritReferences').replaceWith(responseText);
			$('#maritReferences').fadeIn('fast');
		}
  });

	return false;
}

$(document).ready(function(){
	initImageLightboxes();
});
function moveTooltip(slider, sliderId, ui){
				//alert($("#"+sliderId+" a.ui-slider-handle:first").position().left);
				$('#sliderValueMin'+slider).css('left', 
							$("#"+sliderId+" a.ui-slider-handle:first").position().left + 14 - $('#sliderValueMin'+slider).width()
				);	
				$('#sliderValueMax'+slider).css('left', 
							$("#"+sliderId+" a.ui-slider-handle:last").position().left + 6
				);	
				
				if(ui!=0) {
					$('#sliderValueMin'+slider).text(ui.values[0]);		
					$('#sliderValueMax'+slider).text(ui.values[1]);
				}
}

function initSlider(){
	if($('#yearSlider').length > 0){		
		
		$("#yearSlider").slider({
			range: true,
			min: $('#yearSliderMin').val()*1,
			max: $('#yearSliderMax').val()*1,
			values: [$('#minYear').val()*1, $('#maxYear').val()*1],
			step: 1,
			slide: function(event, ui){
				moveTooltip('Year', 'yearSlider', ui);
			},
			stop: function(event, ui) {
				moveTooltip('Year', 'yearSlider', ui);
				
				if($("#minYear").val()!=ui.values[0] || $("#maxYear").val()!=ui.values[1]){
					$("#minYear").val(ui.values[0]).change();
					$("#maxYear").val(ui.values[1]).change();
				}				
			}
		});		
		$('.sliderValue').css('position', 'absolute');
		$('.sliderValue').css('top', $("#yearSlider a.ui-slider-handle:first").position().top-12);	

		$("#yearSlider a.ui-slider-handle:last").css('background', 'url("typo3conf/ext/marit_references/Resources/Public/CssImages/slider-right.png") repeat-x scroll 50% 50% #99CE08');
		moveTooltip('Year', 'yearSlider', 0);
	}
}

function initSearchSubmit(){
	$('#searchProject .search').change(function(){
		$('#searchProject').submit();
	});
	$('#searchProject .searchAll').change(function(objEvent){
		if(this.checked){
			checked = true;
		} else {
			checked = false;
		}
		$('input[name*='+$(this).attr('id').replace(/All$/g, "")+']').each(function(index, domEle){
			if($(domEle).attr('id').search(/All$/g, "") == -1){
				domEle.checked = checked;
			}
		});
		$('#searchProject').submit();
	});
	
	$('#projectSearchSubmit').css('display', 'none');
	
	var pageType = $( '<input type="hidden" name="type" value="1267717411" />' ) ;
	$('#searchProject').append(pageType);


	var options = { 
      //target: $('#maritReferences'),
      type: 'POST',
      beforeSubmit:  function(formData, jqForm, options){
    		//alert('About to submit: \n\n' + $.param(formData));     
				flobuReferenceList.enable();
			},
      success: function(responseText, statusText, xhr, $form){
      	$('#maritReferences').replaceWith(responseText);
		    //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText);		
				flobuReferenceList.disable(); 
				initImageLightboxes();
			}
  };
  
  $('#searchProject').submit(function() { 
      $(this).ajaxSubmit(options); 

      return false; 
  });
}

var flobuReferenceList;

$(document).ready(function(){
	flobuReferenceList = new flower_bubble ({
		base_obj: $('.wrapper'),
		block_mode: 'base_obj',
		base_dir: 'typo3conf/ext/marit_references/Resources/Public/Javascript',
		background: { css: 'white', opacity: 0.78 },
		bubble: { image: 'bubble.png', width: 130, height: 98 },
		flower: { image: 'flower.gif', width: 32, height: 32 }
	});
	
	initSlider();
	initSearchSubmit();	
});

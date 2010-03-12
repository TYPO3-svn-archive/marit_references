function moveTooltip(slider, sliderId, ui){
				$('#sliderValueMin'+slider).css('left', 
							$("#"+sliderId+" a.ui-slider-handle:first").position().left
							+$("#"+sliderId+" a.ui-slider-handle:first").width()
							+$(".sliderTextLeft:first").width()
							-$('#sliderValueMin'+slider).width()
				);	
				$('#sliderValueMax'+slider).css('left', 
							$("#"+sliderId+" a.ui-slider-handle:last").position().left
							+$(".sliderTextRight:first").width()
				);	
				
				if(ui!=0) {
					$('#sliderValueMin'+slider).text(ui.values[0]);		
					$('#sliderValueMax'+slider).text(ui.values[1]);
				}
}

function initSlider(){
	if($('#yearSlider')){		
		
		$("#yearSlider").slider({
			range: true,
			min: $('#yearSliderMin').val()*1,
			max: $('#yearSliderMax').val()*1,
			values: [$('#minYear').val()*1, $('#maxYear').val()*1],
			slide: function(event, ui){
				moveTooltip('Year', 'yearSlider', ui);
			},
			stop: function(event, ui) {
				moveTooltip('Year', 'yearSlider', ui);
				
				$("#minYear").val(ui.values[0]).change();
				$("#maxYear").val(ui.values[1]).change();				
			}
		});		
		$('.sliderValue').css('position', 'absolute');
		$('#sliderValueMinYear').css(
					'top', 
					$("#yearSlider a.ui-slider-handle:first").position().top
		);	
		$('#sliderValueMaxYear').css(
				'top', 
				$("#yearSlider a.ui-slider-handle:last").height()
				+$('#sliderValueMaxYear').height()
		);
		moveTooltip('Year', 'yearSlider', 0);
	}
	
	if($('#budgetSlider')){		
		
		$("#budgetSlider").slider({
			range: true,
			min: $('#budgetSliderMin').val()*1,
			max: $('#budgetSliderMax').val()*1,
			values: [$('#minBudget').val()*1, $('#maxBudget').val()*1],
			step: 5000,
			slide: function(event, ui){
				moveTooltip('Budget', 'budgetSlider', ui);
			},
			stop: function(event, ui) {
				moveTooltip('Budget', 'budgetSlider', ui);
				
				$("#minBudget").val(ui.values[0]).change();
				$("#maxBudget").val(ui.values[1]).change();
			}
		});		
		$('.sliderValue').css('position', 'absolute');
		$('#sliderValueMinBudget').css(
					'top', 
					$("#budgetSlider a.ui-slider-handle:first").position().top
		);
		$('#sliderValueMaxBudget').css(
				'top', 
				$("#budgetSlider a.ui-slider-handle:last").height()
				+$('#sliderValueMaxBudget').height()
		);
		moveTooltip('Budget', 'budgetSlider', 0);	
	}
}

function initSearchSubmit(){
	$('#searchProject .search').change(function(){
		$('#searchProject').submit();
	});
	
	$('#projectSearchSubmit').css('display', 'none');
	
	var pageType = $( '<input type="hidden" name="type" value="1267717411" />' ) ;
	$('#searchProject').append(pageType);
	
	flobuSearchBox = new flower_bubble ({
		base_obj: $('#searchProject'),
		block_mode: 'base_obj',
		base_dir: 'typo3conf/ext/marit_references/Resources/Public/Javascript',
		background: { css: 'white', opacity: 0.78 },
		bubble: { image: 'bubble.png', width: 130, height: 98 },
		flower: { image: 'flower.gif', width: 32, height: 32 }
	});



	var options = { 
      target: $('#maritReferences'),
      type: 'POST',
      beforeSubmit:  function(formData, jqForm, options){
    		//alert('About to submit: \n\n' + $.param(formData));     
				flobuSearchBox.enable();
    		$('#maritReferences').fadeOut('fast');
			},
      success: function(responseText, statusText, xhr, $form){
		    //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText);		      
				flobuSearchBox.disable();
    		$('#maritReferences').fadeIn('fast');
			},
  };
  
  $('#searchProject').submit(function() { 
      $(this).ajaxSubmit(options); 

      return false; 
  });
}


var flobuSearchBox;

$(document).ready(function(){
	initSlider();
	initSearchSubmit();
});
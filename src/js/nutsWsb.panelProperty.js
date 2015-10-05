
nutsWsb.panelProperty =  (function($) {

	var init = function(base,options){
		// alert('init@nutsWsb.panelProperty.js');
		// base は <i>
		// alert(base.html());

		var panel = base.parents(options.panel);
		var targetId = panel.find("[id^='panelproperty-panel-']").attr('id');
		base.click(function() {
			panel.find('.panelcontrol-buttons').css('display','none');
			$('#' + targetId).collapse('toggle').on('shown.bs.collapse', function(){
				panel.find('.panelcontrol-buttons')
					.animate({ opacity: 'show'},{ duration: 100, easing: 'swing'});
			}).on('hidden.bs.collapse', function(){
				panel.find('.panelcontrol-buttons')
					.animate({ opacity: 'show',}, { duration: 100, easing: 'swing', });
			});
		});

	};

	return { init : init };


}(jQuery));

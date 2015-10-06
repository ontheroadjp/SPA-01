
nutsWsb.panelProperty =  (function($) {

	var init = function(base,options){
		// alert('init@nutsWsb.panelProperty.js');
		// base は <i>
		// alert(base.html());

		var panel = base.parents(options.panel);
		var targetId = panel.find("[id^='panelproperty-panel-']").attr('id');
		base.click(function() {
			panel.find('.panelcontrol-buttons').css('display','none');

			// 画面中央上へスクロール
			$("html,body").animate({scrollTop:$(panel).offset().top - 150});
			// $("html,body").animate({scrollTop:数字});

			// パネル設定ウインドウを開く
			$('#' + targetId).collapse('toggle').on('shown.bs.collapse', function(){
				panel.find('.panelcontrol-buttons')
					.animate({ opacity: 'show'},{ duration: 100, easing: 'swing'});
			}).on('hidden.bs.collapse', function(){
				panel.find('.panelcontrol-buttons')
					.animate({ opacity: 'show',}, { duration: 100, easing: 'swing', });
			});

			// 設定ボタンのバインド
			panel.find('.panelproperty-panel-style-btn').click( function() {
				$.getJSON("http://localhost:9999/sitemap.json", function(json) {
					alert(json[0]['css']['0']['section']['background-color']);
				});
			});

		});




	};

	return { init : init };


}(jQuery));


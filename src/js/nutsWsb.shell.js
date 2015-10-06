
nutsWsb.shell = (function($){


	var initModules = function() {

		/*
		 * jQuery panelcontrol plugin
		 * Copyright (c) 2011 Otchy
		 * This source file is subject to the MIT license.
		 * http://www.otchy.net
		 */
		(function($){
			$.fn.panelcontrol = function(userOptions) {
				var options = $.extend({
					'panel':'.panelcontrol-panel',
					'btns':'.panelcontrol-buttons',
					'up':'.panelcontrol-up',
					'down':'.panelcontrol-down',
					'add': 'add-panel-btn',
					'addok': 'add-panel-ok-btn',
					'addcancel': 'add-panel-cancel-btn',
					'delete': 'delete-panel-btn',
					'opacity':'0.6',
					'duration':'slow',
					'marginHeight':'1'
				}, userOptions);

				return this.each(function(baseIndex){
					var base = $(this).css('position', 'relative');
					nutsWsb.panelController.init(base, options);
					// panelController.swapbtn(options);
				});
			};
		}(jQuery));


		(function($){
			$.fn.panelproperty = function(userOptions){
				var options = $.extend({
					'panel':'.panelcontrol-panel',
					'btns':'.panelcontrol-buttons',
					'settings-btn':'.panel-settings-btn',
					'duration':'slow',
				}, userOptions);

				return this.each(function(baseIndex){
					var base = $(this);
					nutsWsb.panelProperty.init(base, options);
				});
			};
		}(jQuery));

	};



	var loadModules = function() {
		initModules();

		// パネルコントロールの初期化
		// @ nutswsb.panelproperty.js
		(function(){
			$('.panel-settings-btn').panelproperty({
				'panel':'.panelcontrol-panel',
				'btns':'.panelcontrol-buttons',
				'settings-btn':'.panel-settings-btn',
				'duration':'600',

				// コールバック
				onpanelswapped: function(base,first,second,options) {
					$.ajax({
						url: 'http://localhost:9999/index.php',
						type: 'POST',
						data: {
							mode: 'panelswap',
							first: first.data('panel-index'),
							second: second.data('panel-index')
						},
						dataType: 'html',
						cache: false,
						async: false,
						timeout: 10000
					})
					.done(function(data){
					})
					.fail(function(data){
					})
					.always(function(data){
					});
				}
			});

		}());


		// パネルコントロールの初期化
		// @ nutswsb.panelController.js
		(function(){
			$('#panelcontrol').panelcontrol({
				'panel':'.panelcontrol-panel',
				'btns': '.panelcontrol-buttons',
				'up':'.panelcontrol-up',
				'down':'.panelcontrol-down',
				'add':'.add-panel-btn',
				'addok':'.add-panel-ok-btn',
				'addcancel':'.add-panel-cancel-btn',
				'delete':'.delete-panel-btn',
				'opacity': 0.6,
				'duration': 600, // slow, normal, fast
				'marginHeight': 1,

				// スワップ時の後処理
				'onpanelswapped': function(base,first,second,options) {
					$.ajax({
						url: 'http://localhost:9999/index.php',
						type: 'POST',
						data: {
							mode: 'panelswap',
							first: first.data('panel-index'),
							second: second.data('panel-index')
						},
						dataType: 'html',
						cache: false,
						async: false,
						timeout: 10000
					})
					.done(function(data){
					})
					.fail(function(data){
					})
					.always(function(data){
					});
				},

				// パネル追加の後処理
				'onpaneladded': function(base,modulepath,panelIndex,options) {
					$.ajax({
						url: 'http://localhost:9999/index.php',
						type: 'POST',
						data: {
							mode: 'paneladd',
							module: modulepath,
							position: panelIndex
						},
						dataType: 'html',
						cache: false,
						async: false,
						timeout: 10000
					})
					.done(function(data){
					});
				},

				// パネル削除の後処理
				'onpaneldeleted': function(base, panelIndex, options) {
					$.ajax({
						url: 'http://localhost:9999/index.php',
						type: 'POST',
						data: {
							mode: 'paneldelete',
							position: panelIndex
						},
						dataType: 'html',
						cache: false,
						async: false,
						timeout: 10000
					})
					.done(function(data){
					});
		 		}
			});
		}());


	};

	return { loadModules : loadModules };

}(jQuery));
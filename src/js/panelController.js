
/**
 * コントロールボタンの表示/非表示制御
 * @return none
 */
function swapbtn() {
	$('.panelcontrol-panel').each(function(index){
	var btnPanel = $(this).children('.panelcontrol-buttons');
		if(index == 0 && $('.panelcontrol-panel').length != 1){
			btnPanel.css('display', 'none');
		} else {
			btnPanel.css('display', 'block');
		}
	});

	var upbtn = $('.panelcontrol-panel .panelcontrol-up');
	var delbtn = $('.panelcontrol-panel .delete-panel-btn');
	if($('.panelcontrol-panel').length == 1) {
		upbtn.hide();
		delbtn.hide();
	} else {
		upbtn.show();
		delbtn.show();
	}

}

/**
 * パネルコントローラーの初期化
 * (1) panel-index を割り付け
 * (2) イベントの登録
 *
 * @param  {[type]} base    [description]
 * @param  {[type]} options [description]
 * @return {[type]}         [description]
 */
function initPanelController( base, options ) {
	base.find(options.panel).each(function(panelIndex){
		var panel = $(this);

		// panelcontrol-panel の初期化
		//panel.addClass('index' + panelIndex);
		panel.data('panel-index',panelIndex).css('position','relative');

		// panelcontrol-up の初期化
		panel.find(options.up).unbind();
		panel.find(options.up).click(function() {
			swap(base, panelIndex, 'up', options);
			return false;
		});

		// panelcontrol-down の初期化
		panel.find(options.down).unbind();
		panel.find(options.down).click(function() {
			swap(base, panelIndex, 'down', options);
			return false;
		});

		// add-panel-btn の初期化
		panel.find(options.add).unbind();
		panel.find(options.add).click(function() {
			swap(base, panelIndex, 'add', options);
			return false;
		});
		
		// delete-panel-btn の初期化
		panel.find(options.delete).unbind();
		panel.find(options.delete).click(function() {
			swap(base, panelIndex, 'delete', options);
			return false;
		});

	});
}


// function initPanelController( base, options ) {
// 			base.find(options.panel).each(function(panelIndex){
// 				var panel = $(this);

// 				// panelcontrol-panel の初期化	
// 				//panel.addClass('panelcontrol-panel-' + panelIndex).css('position', 'relative');
// 				panel.addClass('index' + panelIndex);
// 				panel.data('panel-index',panelIndex).css('position','relative');

// 				// panelcontrol-up の初期化
// 				panel.find(options.up).each(function() {
// 					//$(this).addClass('panelcontrol-up-' + panelIndex);
// 					$(this).data('swap-up-btn-index',panelIndex);
// 				}).click(function() {
// 					swap(base, panelIndex, 'up', options);
// 					return false;
// 				});

// 				// panelcontrol-down の初期化
// 				panel.find(options.down).each(function() {
// 					//$(this).addClass('panelcontrol-down-' + panelIndex);
// 					$(this).data('swap-down-btn-index',panelIndex);
// 				}).click(function() {
// 					swap(base, panelIndex, 'down', options);
// 					return false;
// 				});

// 				// panelcontrol-add の初期化
// 				panel.find(options.add).each(function() {
// 					//$(this).addClass('panelcontrol-add-' + panelIndex);
// 					$(this).data('add-panel-btn-index',panelIndex);
// 				}).click(function() {
// 					swap(base, panelIndex, 'add', options);
// 					return false;
// 				});

// 			});
// }

/**
 * パネル操作（追加、削除、上下入替）の実行
 * @param  {[type]} base       [description]
 * @param  jQueryObj	panelIndex	イベントが発生したパネル
 * @param  String		type		up, down, ad, delete のいずれかを指定
 * @param  Array		options		タグの cass 名など
 * @return none
 */
function swap( base, panelIndex, type, options) {
	var swaps;
	var panels = base.find(options.panel);

	panels.each(function(i){
		var panel = $(this);
		//alert('each(' + i +') - data-panel-index = ' + panel.data('panel-index'));
		
		if(panel.data('panel-index') == panelIndex ) {
			switch (type) {
				case 'up':
					if (i!=0) {
						swaps = [panels.get(i-1), panels.get(i)];
					}
					break;
				case 'down':
					if (i<panels.length-1) {
						swaps = [this, panels.get(i+1)];
					}
					break;
				case 'add':
					$.ajax({
						url: 'http://localhost:9999/ajax.php',
						type: 'POST',
						dataType: 'html',
						data: {
							type: 'editDoc'
						},
						cache: false,
						async: false,
						timeout: 10000
					})
					.done(function(data){
						var newPanel = $(data);
						panel.before(newPanel.css({'display':'none'}));
						newPanel.show("slow");
						if (!!options.onpaneladded) {
							options.onpaneladded(base, data, panelIndex, options);
						}
					});
					break;
				case 'delete':
					panel.hide("slow", function(){
						panel.remove();
						if (!!options.onpaneldeleted) {
							options.onpaneldeleted(base, panelIndex, options);
						}
					});
					break;
			}
			return false;
		}
	});
	if (!swaps) return;
	var first = $(swaps[0]);
	var second = $(swaps[1]);
	var firstHeight = first.outerHeight();
	var secondHeight = second.outerHeight();
	var marginHeight = options.marginHeight;
	if (!marginHeight) {
		var firstMarginHeight = first.outerHeight({margin:true});
		marginHeight = (firstMarginHeight - firstHeight) / 2;
	}

	var finishedCount = 0;
	var onpanelswapped = function() {
		finishedCount++;
		if (finishedCount < 2) return;
		first.css({'opacity': '1', 'top': '0'});
		second.css({'opacity': '1', 'top': '0'});
		first.before(second);
		if (!!options.onpanelswapped) {
			options.onpanelswapped(base, first, second,options);
		}
	};

	first.css('opacity', options.opacity)
		.animate(
			{'top': (secondHeight + marginHeight) + 'px'},
			{'complete': onpanelswapped, 'duration': options.duration}
		);

	second.css('opacity', options.opacity)
		.animate(
			{'top': '-' + (firstHeight + marginHeight) + 'px'},
			{'complete': onpanelswapped, 'duration': options.duration}
		);

}



// /**
//  * 新規パネルを取得する
//  * @return {[type]} [description]
//  */
// function getNewPanel() {
// 	$.ajax({
// 		url: 'http://localhost:9999/ajax.php',
// 		type: 'POST',
// 		dataType: 'html',
// 		cache: false,
// 		async: false,
// 		timeout: 10000

// 	})
// 	.done(function(data){
// 		return data;
// 	})
// 	.fail(function(data){
// 	})
// 	.always(function(data){
// 	});

// }

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
							'up':'.panelcontrol-up',
							'down':'.panelcontrol-down',
							'add': 'add-panel-btn',
							'delete': 'delete-panel-btn',
							'opacity':'0.6',
							'duration':'slow',
							'marginHeight':'1'
						}, userOptions);

		return this.each(function(baseIndex){
			var base = $(this).css('position', 'relative');

			// var swap = function(panelIndex, type) {
			// 	var swaps;
			// 	var targetPanelClass = 'panelcontrol-panel-' + panelIndex;
			// 	var panels = base.find(options.panel);

			// 	panels.each(function(i){
			// 		var panel = $(this);
			// 		if (panel.hasClass(targetPanelClass)) {
			// 			switch (type) {
			// 			case 'up':
			// 				if (i!=0) {
			// 					swaps = [panels.get(i-1), this];
			// 				}
			// 				break;
			// 			case 'down':
			// 				if (i<panels.length-1) {
			// 					swaps = [this, panels.get(i+1)];
			// 				}
			// 				break;
			// 			case 'add':
			// 				$.ajax({
			// 					url: 'http://localhost:9999/ajax.php',
			// 					type: 'POST',
			// 					data: {
			// 						ids: 1,
			// 						mode: 'hoge',
			// 						type: 'entry'
			// 					},
			// 					dataType: 'html',
			// 					cache: false,
			// 					async: false,
			// 					timeout: 10000
							
			// 				})
			// 				.done(function(data){
			// 					panel.before(data);
			// 					swaps = [data, panels.get(i+1)];
			// 					//alert('new panel: ' + data);
			// 				})

			// 				break;
			// 			}
			// 			return false;
			// 		}
			// 	});
			// 	if (!swaps) return;
			// 	var first = $(swaps[0]);
			// 	var second = $(swaps[1]);
			// 	var firstHeight = first.outerHeight();
			// 	var secondHeight = second.outerHeight();
			// 	var marginHeight = options.marginHeight;
			// 	if (!marginHeight) {
			// 		var firstMarginHeight = first.outerHeight({margin:true});
			// 		marginHeight = (firstMarginHeight - firstHeight) / 2;
			// 	}
			// 	var finishedCount = 0;
			// 	var onswapped = function() {
			// 		finishedCount++;
			// 		if (finishedCount < 2) return;
			// 		first.css({'opacity': '1', 'top': '0'});
			// 		second.css({'opacity': '1', 'top': '0'});
			// 		first.before(second);
			// 		if (!!options.onswapped) {
			// 			options.onswapped(base, first, second);
			// 		}
			// 	}
			// 	first
			// 		.css('opacity', options.opacity)
			// 		.animate(
			// 			{'top': (secondHeight + marginHeight) + 'px'},
			// 			{'complete': onswapped, 'duration': options.duration}
			// 		);

			// 	second
			// 		.css('opacity', options.opacity)
			// 		.animate(
			// 			{'top': '-' + (firstHeight + marginHeight) + 'px'},
			// 			{'complete': onswapped, 'duration': options.duration}
			// 		);
				
			// }

			swapbtn();
			initPanelController(base, options);
			// base.find(options.panel).each(function(panelIndex){
			// 	var panel = $(this);
			// 	panel.addClass('panelcontrol-panel-' + panelIndex).css('position', 'relative');

			// 	// panelcontrol-up の初期化
			// 	panel.find(options.up).each(function() {
			// 		$(this).addClass('panelcontrol-up-' + panelIndex);
			// 	}).click(function() {
			// 		swap(panelIndex, 'up');
			// 		return false;
			// 	});

			// 	// panelcontrol-down の初期化
			// 	panel.find(options.down).each(function() {
			// 		$(this).addClass('panelcontrol-down-' + panelIndex);
			// 	}).click(function() {
			// 		swap(panelIndex, 'down');
			// 		return false;
			// 	});

			// 	// panelcontrol-add の初期化
			// 	panel.find(options.add).each(function() {
			// 		$(this).addClass('panelcontrol-add-' + panelIndex);
			// 	}).click(function() {
			// 		swap(panelIndex, 'add');
			// 		return false;
			// 	});

			// });
		});
	};
})(jQuery);

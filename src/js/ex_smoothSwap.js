
function initpanelindex( base, options ) {
			base.find(options.panel).each(function(panelIndex){
				var panel = $(this);

				// smoothswap-panel の初期化
				panel.addClass('index' + panelIndex);
				panel.data('panel-index',panelIndex).css('position','relative');

				// smoothswap-up の初期化
				panel.find(options.up).click(function() {
					swap(base, panelIndex, 'up', options);
					return false;
				});

				// smoothswap-down の初期化
				panel.find(options.down).click(function() {
					swap(base, panelIndex, 'down', options);
					return false;
				});

				// smoothswap-add の初期化
				panel.find(options.add).click(function() {
					swap(base, panelIndex, 'add', options);
					return false;
				});

			});
}


// function initpanelindex( base, options ) {
// 			base.find(options.panel).each(function(panelIndex){
// 				var panel = $(this);

// 				// smoothswap-panel の初期化	
// 				//panel.addClass('smoothswap-panel-' + panelIndex).css('position', 'relative');
// 				panel.addClass('index' + panelIndex);
// 				panel.data('panel-index',panelIndex).css('position','relative');

// 				// smoothswap-up の初期化
// 				panel.find(options.up).each(function() {
// 					//$(this).addClass('smoothswap-up-' + panelIndex);
// 					$(this).data('swap-up-btn-index',panelIndex);
// 				}).click(function() {
// 					swap(base, panelIndex, 'up', options);
// 					return false;
// 				});

// 				// smoothswap-down の初期化
// 				panel.find(options.down).each(function() {
// 					//$(this).addClass('smoothswap-down-' + panelIndex);
// 					$(this).data('swap-down-btn-index',panelIndex);
// 				}).click(function() {
// 					swap(base, panelIndex, 'down', options);
// 					return false;
// 				});

// 				// smoothswap-add の初期化
// 				panel.find(options.add).each(function() {
// 					//$(this).addClass('smoothswap-add-' + panelIndex);
// 					$(this).data('add-panel-btn-index',panelIndex);
// 				}).click(function() {
// 					swap(base, panelIndex, 'add', options);
// 					return false;
// 				});

// 			});
// }

/**
 * パネルの上下入れ替え
 * @param  {[type]} base       [description]
 * @param  {[type]} panelIndex [description]
 * @param  {[type]} type       [description]
 * @param  {[type]} options    [description]
 * @return {[type]}            [description]
 */
function swap( base, panelIndex, type, options) {
	var swaps;
	//var targetPanel = 'smoothswap-panel-' + panelIndex;
	var panels = base.find(options.panel);

	panels.each(function(i){
		var panel = $(this);
		//if (panel.hasClass(targetPanel)) {
		alert('panel index: ' + i +' - data = ' + panel.data('panel-index'));
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
						cache: false,
						async: false,
						timeout: 10000
					})
					// .done(function(data){
					// 	panel.before(data);
					// 	initpanelindex( base, options );
					// 	//swaps = [panels.get(i-1)];
					// 	return false;
					// 	//alert('new panel: ' + data);
					// });
					.done(function(data){
						panel.before(data).css("ocupide, 0.0");
						initpanelindex( base, options );
						//swaps = [panels.get(i-1)];
						return false;
						//alert('new panel: ' + data);
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
	var onswapped = function() {
		finishedCount++;
		if (finishedCount < 2) return;
		first.css({'opacity': '1', 'top': '0'});
		second.css({'opacity': '1', 'top': '0'});
		first.before(second);
		if (!!options.onswapped) {
			options.onswapped(base, first, second);
		}
	};

	first.css('opacity', options.opacity)
		.animate(
			{'top': (secondHeight + marginHeight) + 'px'},
			{'complete': onswapped, 'duration': options.duration}
		);

	second.css('opacity', options.opacity)
		.animate(
			{'top': '-' + (firstHeight + marginHeight) + 'px'},
			{'complete': onswapped, 'duration': options.duration}
		);


}


/**
 * パネルが先頭の場合、swp btn を非表示にする
 * @return {[type]} [description]
 */
function swapbtn() {
	$('.smoothswap-panel').each(function(index){
	var btnPanel = $(this).children('.swap-buttons');
		if(index == 0) {
			btnPanel.css('display', 'none');
		} else {
			btnPanel.css('display', 'block');
		}
	});
}

/**
 * 新規パネルを取得する
 * @return {[type]} [description]
 */
function getNewPanel() {
	$.ajax({
		url: 'http://localhost:9999/ajax.php',
		type: 'POST',
		dataType: 'html',
		cache: false,
		async: false,
		timeout: 10000
	
	})
	.done(function(data){
		return data;
	})
	.fail(function(data){
	})
	.always(function(data){
	});

}

/*
 * jQuery smoothSwap plugin
 * Copyright (c) 2011 Otchy
 * This source file is subject to the MIT license.
 * http://www.otchy.net
 */
(function($){
	$.fn.smoothswap = function(userOptions) {
		var options = $.extend({
							'panel':'.smoothswap-panel',
							'up':'.smoothswap-up',
							'down':'.smoothswap-down',
							'add': 'smoothswap-add',
							'opacity':'0.6',
							'duration':'slow',
							'marginHeight':'1'
						}, userOptions);

		return this.each(function(baseIndex){
			var base = $(this).css('position', 'relative');

			// var swap = function(panelIndex, type) {
			// 	var swaps;
			// 	var targetPanelClass = 'smoothswap-panel-' + panelIndex;
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

			initpanelindex(base, options);
			// base.find(options.panel).each(function(panelIndex){
			// 	var panel = $(this);
			// 	panel.addClass('smoothswap-panel-' + panelIndex).css('position', 'relative');

			// 	// smoothswap-up の初期化
			// 	panel.find(options.up).each(function() {
			// 		$(this).addClass('smoothswap-up-' + panelIndex);
			// 	}).click(function() {
			// 		swap(panelIndex, 'up');
			// 		return false;
			// 	});

			// 	// smoothswap-down の初期化
			// 	panel.find(options.down).each(function() {
			// 		$(this).addClass('smoothswap-down-' + panelIndex);
			// 	}).click(function() {
			// 		swap(panelIndex, 'down');
			// 		return false;
			// 	});

			// 	// smoothswap-add の初期化
			// 	panel.find(options.add).each(function() {
			// 		$(this).addClass('smoothswap-add-' + panelIndex);
			// 	}).click(function() {
			// 		swap(panelIndex, 'add');
			// 		return false;
			// 	});

			// });
		});
	}
})(jQuery);

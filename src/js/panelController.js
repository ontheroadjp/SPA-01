
/**
 * btnenable()
 * コントロールボタンの enabel / disable の制御
 * 
 * @param  boolean val     true で disable、false で enable
 * @param  {[type]} options [description]
 * @return {[type]}         [description]
 */
function btnenable(val,options) {
	var upbtn	= $(options.panel + ' ' + options.up);
	var addbtn 	= $(options.panel + ' ' + options.add);
	var delbtn 	= $(options.panel + ' ' + options.delete);

	upbtn.prop('disabled', val);
	addbtn.prop('disabled', val);
	delbtn.prop('disabled', val);
}

/**
 * swapbtn()
 * コントロールボタンの表示/非表示制御
 * 
 * @return none
 */
function swapbtn(options) {
	$(options.panel).each(function(index){
		var btnPanel = $(this).children(options.btns);
		if(index == 0 && $(options.panel).length != 1){
			btnPanel.css('display', 'none');
		} else {
			if(!$(options.panel).hasClass('adding')) {
				btnPanel.css('display', 'block');
			}
		}
	});

	// 削除ボタンと上下入替ボタンの制御
	var upbtn = $(options.panel+' '+options.up);
	var delbtn = $(options.panel+' '+options.delete);
	if($(options.panel).length == 1) {
		upbtn.hide();
		delbtn.hide();
	} else {
		upbtn.show();
		delbtn.show();
	}
}


/**
 * initPanelController()
 *パネルコントローラーの初期化
 *
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
		panel.data('panel-index',panelIndex).css('position','relative');

		// panelcontrol-up の初期化
		panel.find(options.up).unbind();
		panel.find(options.up).click(function() {
			action(base, panelIndex, 'up', options);
			return false;
		});

		// panelcontrol-down の初期化
		panel.find(options.down).unbind();
		panel.find(options.down).click(function() {
			action(base, panelIndex, 'down', options);
			return false;
		});

		// add-panel-btn の初期化
		panel.find(options.add).unbind();
		panel.find(options.add).click(function() {
			action(base, panelIndex, 'add', options);
			return false;
		});

		// delete-panel-btn の初期化
		panel.find(options.delete).unbind();
		panel.find(options.delete).click(function() {
			action(base, panelIndex, 'delete', options);
			return false;
		});

		// add-panel-ok-btn の初期化
		panel.find(options.addok).unbind();
		panel.find(options.addok).click(function() {
			action(base, panelIndex, 'add-ok', options);
			return false;
		});

		// add-panel-cancel-btn の初期化
		panel.find(options.addcancel).unbind();
		panel.find(options.addcancel).click(function() {
			action(base, panelIndex, 'add-cancel', options);
			return false;
		});

		// console.log('initPanelController() OK');
	});
}


/**
 * action()
 * パネル操作（追加、削除、上下入替）の実行
 * 
 * @param  {[type]} base       [description]
 * @param  jQueryObj	panelIndex	イベントが発生したパネル
 * @param  String		type		up, down, ad, delete のいずれかを指定
 * @param  Array		options		タグの cass 名など
 * @return none
 */
function action(base, panelIndex, type, options) {

	var panels = base.find(options.panel);
	panels.each(function(i){
		var panel = $(this);
		//alert('each(' + i +') - data-panel-index = ' + panel.data('panel-index'));
		
		btnenable(true,options);

		if(panel.data('panel-index') == panelIndex ) {
			switch (type) {
				case 'up':
					if (i!=0) {
						// swaps = [panels.get(i-1), panels.get(i)];
						var first = $(panels.get(i-1));
						var second = $(panels.get(i));
						panelSwap(base,first,second,options);
					}
					break;

				case 'down':
					if (i<panels.length-1) {
						// swaps = [this, panels.get(i+1)];
					}
					break;

				case 'add':
					panelAddToDOM(base,panel,panelIndex,options);
					break;

				case 'delete':
					panelDeleteFromDOM(base,panel,panelIndex,options);
					panelDeleteFromServer(base,panel,panelIndex,options);
					break;

				case 'add-ok':
					panelAddToServer(base,panel,panelIndex,options);
					// // ボタンパネルの表示/非表示
					// var ctrlBtns = panel.children('.panelcontrol-buttons').show('slow');
					// var addBtn = panel.children('.panelcontrol-add').css({'display':'none'});

					// // 選択されたパネルを抽出
					// var activePill = panel.find('.tab-pane.fade.active.in');
					// var activeItem = activePill.find('.item.active');
					// var section = activeItem.find('section');

					// // 選択されたパネルを追加
					// panel.children('.tab-content').remove();
					// addBtn.after(section);

					// // 後処理
					// $('div#graylayer').remove();
					// panel.removeAttr('id');
					// panel.removeClass('adding');

					// // 初期化
					// initPanelController(base,options);
					// swapbtn(options);
					// btnenable(false,options);


					// var modulepath = String(section.attr('data-path'));
					// modulepath = modulepath.replace( /-/g , "/" ) + 'module.json';
					// // var modulepath = 'modules/2columns/txtimg/module.json';

					// // Ajax
					// if (!!options.onpaneladded) {
					// 	options.onpaneladded(base, modulepath, panelIndex, options);
					// }

					break;

				case 'add-cancel':
					panelDeleteFromDOM(base,panel,panelIndex,options);

					// panelDelete(base,panel,panelIndex,options);
					break;
			}
			return false;
		}
	});
	// if (!swaps) return;
	// var first = $(swaps[0]);
	// var second = $(swaps[1]);
	// var firstHeight = first.outerHeight();
	// var secondHeight = second.outerHeight();
	// var marginHeight = options.marginHeight;
	// if (!marginHeight) {
	// 	var firstMarginHeight = first.outerHeight({margin:true});
	// 	marginHeight = (firstMarginHeight - firstHeight) / 2;
	// }

	// var finishedCount = 0;
	// var onpanelswapped = function() {
	// 	finishedCount++;
	// 	if (finishedCount < 2) return;
	// 	first.css({'opacity': '1', 'top': '0'});
	// 	second.css({'opacity': '1', 'top': '0'});
	// 	first.before(second);
	// 	if (!!options.onpanelswapped) {
	// 		options.onpanelswapped(base, first, second,options);
	// 	}
	// };

	// first.css('opacity', options.opacity)
	// 	.animate(
	// 		{'top': (secondHeight + marginHeight) + 'px'},
	// 		{'complete': onpanelswapped, 'duration': options.duration}
	// 	);

	// second.css('opacity', options.opacity)
	// 	.animate(
	// 		{'top': '-' + (firstHeight + marginHeight) + 'px'},
	// 		{'complete': onpanelswapped, 'duration': options.duration}
	// 	);
}


/**
 * panelSwap()
 * パネルの上下入替
 *
 * @param  {[type]} first   [description]
 * @param  {[type]} second  [description]
 * @param  {[type]} options [description]
 * @return {[type]}         [description]
 */
function panelSwap(base, first, second, options) {

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

		//アニメーション後の処理
		initPanelController(base,options);
		swapbtn(options);
		btnenable(false,options);

		// Ajax
		if (!!options.onpanelswapped) {
			options.onpanelswapped(base,first,second,options);
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


/**
 * panelAddToODM()
 * 指定したパネルの前に新規パネルを追加する
 * ブラウザ側のみに追加/サーバー側（sitemap.json）には追加しない
 * サーバー側には確定ボタン押下時に追加
 *
 * @param  {[type]} panel [description]
 * @return {[type]}       [description]
 */
function panelAddToDOM(base,panel,panelIndex,options) {
	$.ajax({
		url: 'http://localhost:9999/Spa01/ajax.php',
		type: 'POST',
		dataType: 'html',
		data: {
			type: 'editDoc'
		},
		cache: false,
		async: true,
		timeout: 10000
	})
	.done(function(data){
		var newPanel = $(data);
		panel.before('<div id="graylayer"></div>');
		panel.before(newPanel.css({'display':'none'}));
		// newPanel.attr('id','active');
		// newPanel.addClass('adding');
		// newPanel.show("slow");
		newPanel.attr('id','active').addClass('adding').show("slow");
		var addBtn = newPanel.children('.panelcontrol-add').css({'display':'block'});
		var ctrlBtns = newPanel.children('.panelcontrol-buttons').css({'display':'none'});


		initPanelController(base,options);
		swapbtn(options);
		// initPanelEditor();
		// btnenable(false,options);

		// Ajax
		if (!!options.onpaneladded) {
			options.onpaneladded(base, data, panelIndex, options);
		}

	});
}

function panelAddToServer(base,panel,panelIndex,options) {

	// ボタンパネルの表示/非表示
	var ctrlBtns = panel.children('.panelcontrol-buttons').show('slow');
	var addBtn = panel.children('.panelcontrol-add').css({'display':'none'});

	// 選択されたパネルを抽出
	var activePill = panel.find('.tab-pane.fade.active.in');
	var activeItem = activePill.find('.item.active');
	var section = activeItem.find('section');

	// 選択されたパネルを追加
	panel.children('.tab-content').remove();
	addBtn.after(section);

	// 後処理
	$('div#graylayer').remove();
	panel.removeAttr('id');
	panel.removeClass('adding');

	// 初期化
	initPanelController(base,options);
	swapbtn(options);
	btnenable(false,options);


	var modulepath = String(section.attr('data-path'));
	modulepath = modulepath.replace( /-/g , "/" ) + 'module.json';
	// var modulepath = 'modules/2columns/txtimg/module.json';

	// Ajax
	if (!!options.onpaneladded) {
		options.onpaneladded(base, modulepath, panelIndex, options);
	}
}

/**
 * panelDeleteFromDOM()
 * 指定したパネルを削除する
 *
 * @param  {[type]} panel [description]
 * @return {[type]}       [description]
 */
function panelDeleteFromDOM(base,panel,panelIndex,options) {
	$('div#graylayer').remove();
	panel.hide("slow", function(){
		panel.remove();
		initPanelController(base,options);
   		swapbtn(options);
		btnenable(false,options);
	});
}

function panelDeleteFromServer(base,panel,panelIndex,options) {
	// $('div#graylayer').remove();
	// panel.hide("slow", function(){
	// 	panel.remove();
	// 	initPanelController(base,options);
 //   		swapbtn(options);
	// 	btnenable(false,options);

		// Ajax
		if (!!options.onpaneldeleted) {
			options.onpaneldeleted(base, panelIndex, options);
		}

	// });
}


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
			initPanelController(base, options);
			swapbtn(options);
		});
	};
})(jQuery);

// assert
function assert(actual, expected) {
  console.log('.');
  console.assert(actual === expected, '\nact: ' + actual + '\nexp: ' + expected);
}

function TestSum() {
  assert(1+2, 3);
}

// exec
TestSum();

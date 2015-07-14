
<?php
	// sitemap.json の読み込み or 新規作成
	require_once('core/SitemapManager.php');
	$mm = new SitemapManager();

	// パネル操作の処理
	$mode = $_POST['mode'];
	// echo $mode;
	switch($mode) {
		case 'panelswap':
			$mm->swapModule($_POST['first'], $_POST['second']);
			break;

		case 'paneladd':
			$mm->addModule($_POST['module'], $_POST['position']);
			break;

		case 'paneldelete':
			$mm->deleteModule($_POST['position']);
			break;
	}
?>

<?php $editmode = 1; ?>

<!-- ここから HTML 出力 -->
<?php include('./modules/header.php'); ?>

<!-- ヘッダメニューの出力 -->
<?php if( $editmode == 1 ) { ?>
	<div class="navbar navbar-default navbar-fixed-top">
		<?php include('./modules/admin-bar.php'); ?>
	</div>
<?php } ?>

<div> 
	<?php include('./modules/top-bar.php'); ?>
</div>

<!-- パネルの出力 -->
<div id="panelcontrol">
<?php

	for( $n=0; $n<$mm->modulecount(); $n++ ) {
		$module = $mm->getModule($n);
		if( $editmode == 1 ) { 
			echo $module->getEditDoc();
		} else {
			echo $module->getDoc();
		}
	}

?>
</div><!-- / #panelcontrol -->


<footer>
© 2015 ontheroad.jp  | <a href="<?= $url ?>">Created by SPA-01</a>
</footer>


<script src="js/scripts.js"></script>
<!--
	js/jquery-1.11.1.js
	js/bootstrap.js
	js/jquery.mb.YTPlayer.js 	// 動画プレイヤー
	js/jquery.easing.min.js 	// エフェクトの動きを加減速させる
	js/custom.js

	js/panelEditor.js 			// リアルタイム編集
	js/panelController.js 		// パネル操作（追加、削除、上下入替）
	js/panelChanger.js 			// パネルの差替え（アコーディオン）
-->

<script type="text/javascript"> 
$(function(){

	// パネルエディターの初期化
	// @ panelEditor.js
	initPanelEditor();

	// パネルカルーセルの初期化
	// @ panelChanger.js
	// initPanelChanger();

	// パネルコントロールの初期化
	// @ panelController.js
	$('#panelcontrol').panelcontrol({
		panel:'.panelcontrol-panel',
		btns: '.panelcontrol-buttons',
		up:'.panelcontrol-up',
		down:'.panelcontrol-down',
		add:'.add-panel-btn',
		addok:'.add-panel-ok-btn',
		addcancel:'.add-panel-cancel-btn',
		delete:'.delete-panel-btn',
		opacity: 0.6,
		duration: 600, // slow, normal, fast
		marginHeight: 1,

		// スワップ時の後処理
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
		},

		// パネル追加の後処理
		onpaneladded: function(base, data,panelIndex,options) {
			// swapbtn();
			// initPanelController(base,options);
			// initPanelEditor();

			$.ajax({
				url: 'http://localhost:9999/index.php',
				type: 'POST',
				data: {
					mode: 'paneladd',
					module: data,
					position: panelIndex
				},
				dataType: 'html',
				cache: false,
				async: false,
				timeout: 10000
			})
			.done(function(data){
				initPanelController(base,options);
				initPanelEditor();
				swapbtn(options);
				btnenable(true,options);
			});
		},

		// パネル削除の後処理
		onpaneldeleted: function(base, panelIndex, options) {
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

});
</script>


</body>
</html>

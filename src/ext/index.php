
<?php
	require_once('core/ModuleManager.php');
	$mm = new ModuleManager();

	$mode = $_POST['mode'];
	echo $mode;
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

<?php include('./modules/header.php'); ?>


<div class="navbar navbar-default navbar-fixed-top">
	<?php include('./modules/admin-bar.php'); ?>
</div>

<div> 
	<?php include('./modules/top-bar.php'); ?>
</div>

<div id="panelcontrol">
<?php

	for( $n=0; $n<$mm->modulecount(); $n++ ) {
		$module = $mm->getModule($n);
		echo $module->getEditDoc();
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
		up:'.panelcontrol-up',
		down:'.panelcontrol-down',
		add:'.add-panel-btn',
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
				async: true,
				timeout: 10000
			})
			.done(function(data){
				swapbtn();
				initPanelController(base,options);
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
				async: true,
				timeout: 10000
			})
			.done(function(data){
				swapbtn();
				initPanelController(base,options);
				initPanelEditor();
			})
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
				async: true,
				timeout: 10000
			})
			.done(function(data){
		   		swapbtn();
				initPanelController(base,options);
			})
 		}

	});

});
</script>


</body>
</html>

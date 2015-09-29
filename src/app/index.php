<?php 
// namespace Spa01;
// use Spa01\Core\SitemapManager;

// TEMP
$editmode = 1; 
$a = $_GET['view'];
$a == 'preview' ? $editmode = 0 : $editmode = 1;
?>



<?php
	// conf.json の読み込み
	if( $file = file_get_contents( 'conf.json' ) ) {
		$json = json_decode( $file, true );	// true 付けると連想配列
//		var_dump($json);
	} else {
		echo '読み込みエラー<br>';
		echo $path;
	}

	// sitemap.json の読み込み or 新規作成
	require_once(dirname('__FILE__').'/Spa01/Core/SitemapManager.php');
	$sitemapManager = new SitemapManager();


	// パネル操作の処理
	$mode = $_POST['mode'];

	switch($mode) {
		case 'panelswap':
			$sitemapManager->swapModule($_POST['first'], $_POST['second']);
			break;

		case 'paneladd':
			$sitemapManager->addModule($_POST['module'], $_POST['position']);
			break;

		case 'paneldelete':
			$sitemapManager->deleteModule($_POST['position']);
			break;
	}
?>


<!-- ここから HTML 出力 -->
<?php include(dirname('__FILE__').'/Spa01/Modules/header.php'); ?>

<!-- <div class="sidebar" style="float:left;width:200px;background-color:#000">
		<ul>
			<li><a href="#">Menu</a></li>
			<li><a href="#">Menu</a></li>
			<li><a href="#">Menu</a></li>
			<li class="divider"></li>
			<li><a href="#" data-role="sidemenu-toggle">Close</a></li>
		</ul>
</div>
 -->
<!-- <div data-role="sidemenu-container" data-sidemenu-dir="left">
	<div data-role="sidemenu-content">
		<div id="sidemenu">
		<ul>
			<li><a href="#">Menu</a></li>
			<li><a href="#">Menu</a></li>
			<li><a href="#">Menu</a></li>
			<li class="divider"></li>
			<li><a href="#" data-role="sidemenu-toggle">Close</a></li>
		</ul>
		</div>
		<a href="#" data-role="sidemenu-toggle">Open side menu</a>
	</div>
</div>
 -->


<!-- ヘッダメニューの出力 -->
<?php if( $editmode == 1 ) { ?>
	<!-- <div class="navbar navbar-default navbar-fixed-top"> -->
		<?php //include(dirname('__FILE__').'/Spa01/Modules/admin-bar.php'); ?>
	<!-- </div> -->
<?php } ?>

<div id="aside"></div>

<div> <?php include(dirname('__FILE__').'/Spa01/Modules/top-bar.php'); ?></div>



<!-- パネルの出力 -->
<div id="panelcontrol">
<?php
	for( $n=0; $n<$sitemapManager->modulecount(); $n++ ) {
		$module = $sitemapManager->getModule($n);
		if( $editmode == 1 ) { 
			echo $module->getEditDoc();
		} else {
			echo $module->getDoc();
		}
	}
?>
</div><!-- / #panelcontrol -->

<!-- フッター -->
<footer>
	© 2015 ontheroad.jp  | <a href="<?= $url ?>">Created by SPA-01</a>
</footer>


<!-- ------------------------------------------------------------- -->
<!-- JAVASCRIPT SECSSION -->
<!-- ------------------------------------------------------------- -->


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


    var $window             = $(window),
        $aside              = $('#aside'),
        defaultPositionLeft = $aside.css('left'),
        setOffsetPosition   = $aside.offset(),
        fixedClassName      = 'fixed';
 
    $window.on('scroll', function() {
        if ($(this).scrollTop() > setOffsetPosition.top) {
            $aside.addClass(fixedClassName).css('left', setOffsetPosition.left);
        } else {
            if ($aside.hasClass(fixedClassName)) {
                // $aside.removeClass(fixedClassName).css('left', defaultPositionLeft);
            }
        }
    }).trigger('scroll');


// https://github.com/Fooidge/PleaseJS
// http://www.checkman.io/please/
// alert( Please.make_scheme(
// 			{
// 			    h: 130,
// 			    s: 0.7,
// 			    v: 0.75
// 			},
// 			{
// 			    scheme_type: 'complement',
// 			    format: 'hex'
// 			})
// );



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
		onpaneladded: function(base,modulepath,panelIndex,options) {
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

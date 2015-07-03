
<?php
	$modules_class = array(
		'Home' => 'modules/home/01/'
		, 'Services' => 'modules/services/01/'
		, 'Parallax' => 'modules/parallax/01/'
		, 'Portfolio' => 'modules/portfolio/01/'
		, 'Movie' => 'modules/movie/01/'
		, 'Location' => 'modules/location/01/'
		, 'Clients' => 'modules/clients/01/'
	);
?>

<html>
<head>
<?php include('./modules/head.php'); ?>

<style>
.preview {
	cursor: pointer;
	-webkit-transform: scale(0.6,0.6);
	transform: scale(0.6,0.6);
	transition-duration: .3s;
	-webkit-transition-duration: .3s;
	z-index: 1;
	border: 1px solid #000
}
</style>
</head>

<body>
<div class="navbar navbar-default navbar-fixed-top">
	<?php include('./modules/admin-bar.php'); ?>
</div>
<div style="margin-top: 50px;">
	<?php include('./modules/top-bar.php'); ?>
</div>


<!-- <div id="smoothswap"> -->
<?php
	// //$count = 0;
	// foreach( $modules_class as $name => $dir_path ) {
	// 	//$count ++;
	// 	require_once( $dir_path.$name.'.php' );
	// 	$module = new $name( $dir_path );
	// 	echo '<div class="smoothswap-panel">';
	// 		echo '<div class="swap-buttons">';
	// 			echo '<button class="smoothswap-up btn btn-default">▲（パネルの入れ替え）▼</button>';
	// 			//echo '<button class="smoothswap-down btn btn-default">▼（下へ移動）</button>';
	// 			//echo '<button class="add-panel btn btn-primary">パネル追加</button>';
	// 			//echo '<button class="change-panel btn btn-edit" data-panel-no="'.$count.'">パネル変更</button>';
	// 			//echo '<button class="add-panel btn btn-danger">パネル削除</button>';
	// 		echo '</div>';

	// 		//echo '<div class="panel-'.$count.'">';
	// 		echo $module->getDoc();
	// 		//echo '</div>';
	// 	echo '</div><!-- / .smoothswap-panel -->';
	// }
?>
<!-- </div>/ .smoothswap -->




<div id="smoothswap">
<?php
	$count = 0;
	foreach( $modules_class as $name => $dir_path ) {
		$count ++;
		require_once( $dir_path.$name.'.php' );
		$module = new $name( $dir_path );

		// パネルスワップ
		echo '<div class="smoothswap-panel">';
		echo '<div class="swap-buttons">';

		echo '<div class="row">';
		echo '<div class="col-md-4 col-md-offset-4 text-center">';

		echo '<button class="smoothswap-up btn btn-default">▲（パネルの入れ替え）▼</button>';

		echo '</div>';
		echo '</div>';

		echo '</div>';

			// パネルカルーセル
			echo '<div id="my-carousel-'.$count.'" class="carousel slide">';
			echo '<div class="carousel-inner">';

				echo '<div class="item active">';
					echo $module->getDoc();
				echo '</div>';

				echo '<div class="item">';
					echo $module->getDoc();
				echo '</div>';

				echo '<div class="item">';
					echo '<img src="holder.js/900x500/auto/#777:#fff/text:Third slide" alt="">';
				echo '</div>';
			echo '</div><!-- / .carousel-inner -->';

			// カルーセル左ボタン
			echo '<a class="left carousel-control" href="#my-carousel-'.$count.'" data-slide="prev">';
			echo '<span class="glyphicon glyphicon-chevron-left"></span></a>';

			// カルーセル右ボタン
			echo '<a class="right carousel-control" href="#my-carousel-'.$count.'" data-slide="next">';
			echo '<span class="glyphicon glyphicon-chevron-right"></span></a>';

			echo '</div><!-- / #my-carousel .carousel .slide -->';

		// パネルスワップ
		echo '</div><!-- / .smoothswap-panel -->';

	}
?>
</div>/ .smoothswap

<footer>
© 2015 YourDomain.com  | <a href="http://www.designbootstrap.com/" target="_blank">by DesignBootstrap</a>
</footer>

<!--
	js/jquery-1.11.1.js
	js/bootstrap.js
	js/jquery.mb.YTPlayer.js 	// 動画プレイヤー
	js/jquery.easing.min.js 	// エフェクトの動きを加減速させる
	js/custom.js

	js/editable.js 			// 直接編集
	js/accordion.js 			// アコーディオン
	js/realPre1.01.js 		//  テキストボックへの入力をリアルタイムで画面表示
-->

<script src="js/scripts.js"></script>



<script type="text/javascript"> 
$(function(){

	// パネルカルーセル
	var num = $('.carousel-inner').length;
	alert(num);
	for( n=1; n<num; n++) {
		$('#my-carousel-'+n)
			.carousel('pause')
			.on('slid.bs.carousel', function () {
				var a = $('.item.active').each(function(index) {
					 alert( $(this).children('section').attr('id') );
				});
//				alert('carousel@index.php - '+a[0]);
				});
	}

	// パネルスワップ
	$('#smoothswap').smoothswap({
		panel:'.smoothswap-panel',
		up:'.smoothswap-up',
		down:'.smoothswap-down',
		opacity: 0.6,
		duration: 600, // slow, normal, fast
		marginHeight: 1,
    	onswapped: function(base,first,second) {
    		swapbtn();	// editable.js に定義
    		base.find('.item.active').each(function(index) {
				 alert( $(this).children('section').attr('id') );
    	});
//    		alert('swap@index.php');
    	}

	});
});
</script>


</body>
</html>

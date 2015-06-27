
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

.edit-section {
}

.edit-section dt {
	display: block;
	width: 100px;
	height: 30px;
	line-height: 30px;
	text-align: center;
	border: #666 1px solid;
	cursor: pointer;
	float: right;
	position: relative;
	bottom: 30;
	background-color: rgba(255, 0, 213, 0.65);
	color: #fff;
}

.edit-section dd {
	background:#f2f2f2;
	text-align:center;
	display:none;
}

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


<?php
	$doc_edit_prefix = '';
	$doc_edit_prefix .='<dl id="acMenu" class="edit-section">';
	$doc_edit_prefix .='<dt>Edit</dt><!-- 開閉ボタン -->';
	$doc_edit_prefix .='<dd><!-- 開閉される内容 -->';
// 	$doc_edit_prefix .='<div class="preview">';

	$doc_edit_suffix = '';
// 	$doc_edit_suffix .= '</div>';
	$doc_edit_suffix .= '</dd>';
	$doc_edit_suffix .= '</dl>';

	foreach( $modules_class as $name => $dir_path ) {
		require_once( $dir_path.$name.'.php' );
		$module = new $name( $dir_path );
		echo $module->getDoc();


//		echo $doc_edit_prefix;			
// 		echo '<div class="preview">';	// 編集用プレビュー
// 		echo $doc;
// 		echo '</div>';

// 		echo '<form><fieldset><legend>コンテンツの編集</legend>';	
// 		foreach( $editable as $key => $val ) {
// 
// 			echo '<script type="text/javascript">';
// 			echo '$(document).ready( function(){';
// 			echo '$(".'.$prefix.'_'.$key.'").realPre(".'.$prefix.'_'.$key.'");';
// 			echo '});';
// 			echo '</script>';
// 
// 			switch( $val ) {
// 				case "text" :
// 					echo '<label>'.$key.'</label>';
// 					echo '<input class="form-control '.$prefix.'_'.$key.'" type="text" name="'.$prefix.'_'.$key.'">';
// 					break;
// 				case "color" :
// 					echo '<div>色選択</div>';
// 					break;
// 				default:
// 					echo 'エラー';
// 			}
// 		}
// 		echo '</fieldset></form>';
// 		echo '<button>全て元に戻す</button>';
// 		echo $doc_edit_suffix;
	}
?>

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
</body>
</html>

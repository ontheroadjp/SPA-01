<?php	$modules = array(		'home'		, 'services'		, 'parallax'		, 'portfolio'		, 'movie'		, 'location'		, 'clients'	);?><html><head><?php include('./components/head.php'); ?><style>.editable {}.editing {	padding: 20px;	border-radius: 10px;	background-color: rgba(4, 63, 43, 0.96);	color: #fff;}.edit-section {}.edit-section dt {	display: block;	width: 100px;	height: 30px;	line-height: 30px;	text-align: center;	border: #666 1px solid;	cursor: pointer;	float: right;	position: relative;	bottom: 30;	background-color: rgba(255, 0, 213, 0.65);	color: #fff;}.edit-section dd {	background:#f2f2f2;	text-align:center;	display:none;}.preview {	cursor: pointer;	-webkit-transform: scale(0.6,0.6);	transform: scale(0.6,0.6);	transition-duration: .3s;	-webkit-transition-duration: .3s;	z-index: 1;	border: 1px solid #000}</style></head><body><?php include('./components/topbar.php'); ?><?php	$doc_edit_prefix = '';	$doc_edit_prefix .='<dl id="acMenu" class="edit-section">';	$doc_edit_prefix .='<dt>Edit</dt><!-- 開閉ボタン -->';	$doc_edit_prefix .='<dd><!-- 開閉される内容 -->';// 	$doc_edit_prefix .='<div class="preview">';		$doc_edit_suffix = '';// 	$doc_edit_suffix .= '</div>';	$doc_edit_suffix .= '</dd>';	$doc_edit_suffix .= '</dl>';		for( $n=0; $n<count( $modules ); $n++ ) {		include( 'modules/'.$modules[$n].'.php' );		echo '<div class="editable">'.$doc.'</div>';					// コンテンツの表示//		echo $doc_edit_prefix;			// 		echo '<div class="preview">';	// 編集用プレビュー// 		echo $doc;// 		echo '</div>';	// 		echo '<form><fieldset><legend>コンテンツの編集</legend>';	// 		foreach( $editable as $key => $val ) {// // 			echo '<script type="text/javascript">';// 			echo '$(document).ready( function(){';// 			echo '$(".'.$prefix.'_'.$key.'").realPre(".'.$prefix.'_'.$key.'");';// 			echo '});';// 			echo '</script>';// // 			switch( $val ) {// 				case "text" :// 					echo '<label>'.$key.'</label>';// 					echo '<input class="form-control '.$prefix.'_'.$key.'" type="text" name="'.$prefix.'_'.$key.'">';// 					break;// 				case "color" :// 					echo '<div>色選択</div>';// 					break;// 				default:// 					echo 'エラー';// 			}// 		}// 		echo '</fieldset></form>';// 		echo '<button>全て元に戻す</button>';// 		echo $doc_edit_suffix;	}?><footer>© 2015 YourDomain.com  | <a href="http://www.designbootstrap.com/" target="_blank">by DesignBootstrap</a></footer><!-- js/jquery-1.11.1.js	js/jquery.mb.YTPlayer.js	js/jquery.easing.min.js	js/custom.js--><script src="js/scripts.js"></script></body></html>
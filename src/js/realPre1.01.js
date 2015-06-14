// http://logic-a.com/2013/07/10/jquery_textbox_realtime_plugin_maked/
// <!-- <head>内に記述 -->
// 	<!-- jQueryを先に読み込む -->
// 	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
// 	<!-- 当jQueryプラグインを読み込む -->
// 	<script type="text/javascript" src="realPre1.0.js" ></script>
//  
// <!-- <body>内に記述 -->
// 	<script type="text/javascript">
// 		jQuery(document).ready(function(){
// 			jQuery("#inputText").realPre();
// 		});
// 	</script>
//  
// 	<!-- プレビューを表示させる要素 -->
// 	<div class="real"></div>
// 	<!-- テキストボックス -->
// 	<input type="text" id="inputText" >
	
(function($){
	$.fn.realPre = function(previewDOM, textRevival){ //リアルタイムでプレビュー表示させたい要素（DOM）を指定
		//引数が入力されていない場合（undefindの場合）
		if (previewDOM == void 0) {
			var p = jQuery(".real"); //class名　real　を対象にする
		}
		//引数にclass名やid名が入力されていた場合
		else {
			var idORclass = previewDOM.substr(0, 1); //引数の頭文字を取得
			//引数の形式が id名やclass名 になっているかどうかの判定
			if (idORclass === "#" || idORclass === ".") {
				var p = jQuery(previewDOM); //引数のid名やclass名を対象にする
			}
			//引数の形式がおかしい場合にエラーを返して停止させる
			else {
				alert(idORclass + "引数には【id名】か【class名】を指定して下さい。\nidなら頭に　【 # 】　\nclassなら頭に　【 . 】　\nを入力してからid名やclass名を入れて下さい。");
				return false;
			}
		}
		
		//元のテキストを戻す？
		if (textRevival == false) {
			textRevival = false;
		}
		else {
			textRevival = true;
		}
		var r = "";
		if (textRevival) {
			r = p.text();
			textRevival = false;
		}
		
		
		//テキストボックスのイベント。何かしらアクションがあれば動作させるようにする
		jQuery(this).on("focus blur keypress change keydown keyup", function(){
			var t = jQuery(this).val(); //テキストボックスの値を取得
			if (t.length == 0) {
				p.html(r); //初期値へ戻す
			}
			else {
				p.html(t); //プレビューさせたい要素にテキストボックスの値を入れる
			}
		});
		
		return this; //このプラグインの後に他のメソッドチェーンがあっても対応できるようにする
	}
})(jQuery);
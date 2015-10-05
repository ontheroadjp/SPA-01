
<?php
// conf.json は index.php で読み込む

?>

<div id="aside">
<!-- 	<article style="background-color: #fff;">
		<select id="scheme-color-picker">
			<option value="salmon">Salmon</option>
			<option value="skyblue">Sky Blue</option>
			<option value="palegreen">Pale Green</option>
			<option value="plum">Plum</option>
		</select>
		<button id="scheme-color">Try It</button>
		<div id="scheme-demo" class="clearfix">
			<div class="demo multiple" style="background: rgb(135, 206, 235);"></div>
			<div class="demo multiple" style="background: rgb(135, 172, 235);"></div>
			<div class="demo multiple" style="background: rgb(135, 139, 235);"></div>
			<div class="demo multiple" style="background: rgb(164, 135, 235);"></div>
		</div>
	</article>
 -->
<!-- 
// 
<div id="whole_box">
<div id="selectbox">
	<div id="bufcolor"><div id="0-0" class="clbox" name="#db5ba8" style="border-color: rgb(219, 91, 168); background-color: rgb(219, 91, 168);"></div><div id="0-1" class="clbox clboxs" name="#db5b7e" style="border-color: rgb(219, 91, 126); background-color: rgb(219, 91, 126);"></div><div id="0-2" class="clbox" name="#db635b" style="border-color: rgb(219, 99, 91); background-color: rgb(219, 99, 91);"></div><div id="0-3" class="clbox" name="#db8e5b" style="border-color: rgb(219, 142, 91); background-color: rgb(219, 142, 91);"></div><div id="0-4" class="clbox" name="#dbb85b" style="border-color: rgb(219, 184, 91); background-color: rgb(219, 184, 91);"></div><div class="clbox_clf"></div><div id="1-0" class="clbox" name="#db1a8e" style="border-color: rgb(219, 26, 142); background-color: rgb(219, 26, 142);"></div><div id="1-1" class="clbox" name="#db1a4e" style="border-color: rgb(219, 26, 78); background-color: rgb(219, 26, 78);"></div><div id="1-2" class="clbox" name="#db261a" style="border-color: rgb(219, 38, 26); background-color: rgb(219, 38, 26);"></div><div id="1-3" class="clbox" name="#db661a" style="border-color: rgb(219, 102, 26); background-color: rgb(219, 102, 26);"></div><div id="1-4" class="clbox" name="#dba61a" style="border-color: rgb(219, 166, 26); background-color: rgb(219, 166, 26);"></div><div class="clbox_clf"></div><div id="2-0" class="clbox" name="#db0084" style="border-color: rgb(219, 0, 132); background-color: rgb(219, 0, 132);"></div><div id="2-1" class="clbox" name="#db003b" style="border-color: rgb(219, 0, 59); background-color: rgb(219, 0, 59);"></div><div id="2-2" class="clbox" name="#db0d00" style="border-color: rgb(219, 13, 0); background-color: rgb(219, 13, 0);"></div><div id="2-3" class="clbox" name="#db5600" style="border-color: rgb(219, 86, 0); background-color: rgb(219, 86, 0);"></div><div id="2-4" class="clbox" name="#db9f00" style="border-color: rgb(219, 159, 0); background-color: rgb(219, 159, 0);"></div><div class="clbox_clf"></div></div>

	<div id="picker"><div class="farbtastic"><div class="color" style="background-color: rgb(168, 255, 0);"></div><div class="wheel"></div><div class="overlay"></div><div class="h-marker marker" style="left: 180px; top: 83px;"></div><div class="sl-marker marker" style="left: 93px; top: 97px;"></div></div></div>
	
	<div style="clear: both;"></div>
</div>
</div> -->





</div><!-- / .asid -->

<!-- <div class="admin-bar">
    <a class="brand" href="../">WEB サイトの編集</a>
    <ul class="nav pull-right">
		<li><a data-toggle="modal" href="#general-settings-modal">基本設定</a>
		<li><a data-toggle="modal" href="#image-gararry-modal">画像ギャラリー</a></li>
		<li><a href="">色設定</a></li>
		<li><a href="uploader.html">画像設定</a></li>
		<li><a href="/?view=preview" target="_blank">プレビュー</a></li>
		<li><a href="?action=logout">ログアウト</a></li>
    </ul>
</div> -->



<!-- モーダル（id="general-settings-modal"） -->
<div class="modal" id="general-settings-modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">WEB サイトの基本設定</h4>
</div><!-- / .modal-header -->
<div class="modal-body">
<p>

<form>
	<!-- <fieldset> -->
		<div class="form-group">
			<label for="sitename">サイト名</label>
			<input id="sitename" type="text" class="form-control" value="<?= $json['sitename']?>">
			<p class="help-block">サイト名を入力してください（32文字前後が理想です）</p>
		</div>
		<div class="form-group">
			<label for="description">サイトの説明文</label>
			<input id="description" type="text" class="form-control" value="<?= $json['description']?>">
			<p class="hepl-block">サイトの説明文を入力してください(64文字前後が理想です)</p>
		</div>
		<div class="form-group">
			<label for="keywords">サイトの関連キーワード</label>
			<input id="keywords" type="text" class="form-control" value="<?= $json['keywords']?>">
			<p class="help-block">サイトに関連するキーワードを入力してください（3〜5個が理想です）<br>サイト名や説明文にも同じキーワードを含むと理想です</p>
		</div>
	<!-- </fieldset> -->
</form>

</p>
</div><!-- / .modal-body -->
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
<button type="button" class="btn btn-primary">保存</button>
</div><!-- / .modal-footer -->
</div><!-- / .modal-content -->
</div><!-- / .modal-dialog -->
</div><!-- / .modal -->


<!-- モーダル（id="image-gararry-modal"） -->
<div class="modal" id="image-gararry-modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">画像ギャラリー</h4>
</div><!-- / .modal-header -->
<div class="modal-body">
<p>コンテンツ</p>
</div><!-- / .modal-body -->

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
<button type="button" class="btn btn-primary">更新</button>
</div><!-- / .modal-footer -->
</div><!-- / .modal-content -->
</div><!-- / .modal-dialog -->
</div><!-- / .modal -->



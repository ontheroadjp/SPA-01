<?php

class ModuleUtilities {

	/**
	 * static wrapPanelControll()
	 * パネルコントロール用の HTML を付加する
	 * 
	 * @param  [type] $doc [description]
	 * @return [type]      [description]
	 */
	public static function wrapPanelControll($id, $doc) {
		$val = '';

		// パネルコントロール
		$val .= '<div class="panelcontrol-panel">';

		$val .= '<div class="panelcontrol-buttons">';
		$val .= '<div class="container">';
		$val .= '<div class="row">';

			$val .= '<div class="col-md-2 col-sm-2 col-xs-4 text-left">';
			$val .= '<button class="delete-panel-btn btn btn-danger btn-sm">パネル削除</button>';
			$val .= '</div>';

			$val .= '<div class="col-md-8 col-sm-8 col-xs-4 text-center">';
			$val .= '<button class="panelcontrol-up btn btn-default btn-sm">▲（上下入れ替え）▼</button>';
			$val .= '</div>';

			$val .= '<div class="col-md-2 col-sm-2 col-xs-4 text-right">';
			$val .= '<button class="add-panel-btn btn btn-default btn-sm">◀︎◀︎パネル追加</button>';
			$val .= '</div>';
			
		$val .= '</div><!-- / .row -->';
		$val .= '</div><!-- / .container -->';
		$val .= '</div><!-- / .panelcontrol-buttons -->';

		// パネルコントロール（追加ボタン）
		$val .= '<div class="panelcontrol-add" style="display: none;">';
		$val .= '<div class="container">';
		$val .= '<div class="row">';
 
			$val .= '<div class="col-md-10 col-sm-10 col-xs-12 text-right">';
				$val .= '<ul class="nav nav-pills">';
					$val .= '<li class="active"><a href="#tab0" data-toggle="pill">タブ1</a></li>';
					$val .= '<li><a href="#tab1" data-toggle="pill">タブ2</a></li>';
					$val .= '<li><a href="#tab2" data-toggle="pill">タブ3</a></li>';
					$val .= '<li><a href="#tab3" data-toggle="pill">タブ4</a></li>';
					$val .= '<li><a href="#tab4" data-toggle="pill">タブ5</a></li>';
				$val .= '</ul>';
			$val .= '</div>';
 
			$val .= '<div class="col-md-1 col-sm-1 col-sm-offset-0 col-xs-3 col-xs-offset-6 text-right">';
			$val .= '<button class="add-panel-ok-btn btn btn-primary btn-sm">確定</button>';
			$val .= '</div>';

			$val .= '<div class="col-md-1 col-sm-1 col-xs-3 text-right">';
			$val .= '<button class="add-panel-cancel-btn btn btn-default btn-sm">キャンセル</button>';
			$val .= '</div>';
			
		$val .= '</div><!-- / .row -->';
		$val .= '</div><!-- / .container -->';
		$val .= '</div><!-- / .panelcontrol-add -->';


		// パネルプロパティコントロール
		$val .= '<div class="panelproperty-buttons">';
		// $val .= '<div class="container">';
		// $val .= '<div class="row">';

			$val .= '<ul>';
			$val .= '<li><button id="panel-settings-btn" class="panel-settings-btn"><i class="fa fa-cog"></i></a></button></li>';
			$val .= '</ul>';
			
		// $val .= '</div><!-- / .row -->';
		// $val .= '</div><!-- / .container -->';
		$val .= '</div><!-- / .panelproperty-buttons -->';

		// パネルプロパティコントロール（開くパネル）
		$val .= '<div id="panelproperty-panel-'.$id.'" class="panelproperty-panel collapse panelproperty-collapse panelproperty-window" style="height: auto;">';


$val .= '<ul class="top-menu" id="strikingly-top-menu">';

$val .= '<li class="green">';
$val .= '	<a class="save">';
$val .= '	<i class="fa fa-cog"></i>';
$val .= '	<div class="si-hover si-save-icon-hover"></div>';
$val .= '	<span class="button-label">Save</span>';
$val .= '	</a>';
$val .= '</li>';

$val .= '<li class="orange right pub-alert show-pub-alert">';
$val .= '	<a class="page publish-button" data-original-title="You have unpublished changes. Click to go live!" rel="tooltip-right">';
$val .= '	<i class="fa fa-cog"> </i>';
$val .= '	<div class="si-hover si-page-icon-hover"></div>';
$val .= '	<span class="button-label">Publish</span>';
$val .= '	</a>';
$val .= '</li>';

$val .= '<li class="hidden gray selected">';
$val .= '	<a class="save selected">';
$val .= '		<i class="fa fa-cog"> </i>';
$val .= '		<div class="si-hover si-page-icon-hover"></div>';
$val .= '		<span class="button-label">Publishing...</span>';
$val .= '	</a>';
$val .= '</li>';

$val .= '<li class="blue" rel="tooltip-right" data-original-title="Try different styles or change your template.">';
$val .= '	<a class="button styles">';
$val .= '		<i class="fa fa-cog"> </i>';
$val .= '		<div class="si-hover si-styles-icon-hover"></div>';
$val .= '		<span class="button-label">Styles</span>';
$val .= '	</a>';
$val .= '</li>';

$val .= '<li class="purple right" rel="tooltip-right" data-original-title="Domains, SEO, header/footer, and lots more.">';
$val .= '	<a class="settings">';
$val .= '		<i class="fa fa-cog"> </i>';
$val .= '		<div class="si-hover si-settings-icon-hover"></div>';
$val .= '		<span class="button-label">Settings</span>';
$val .= '	</a>';
$val .= '</li>';

$val .= '</ul>';

$val .='<div class="clearfix"></div>';

		// $val .= '<ul>';
		// $val .= '<li><img style="width:100px;margin:20px auto;margin-bottom:20px;" class="img-responsive" src="lib/Modules/2columns/txtimg/img/ipad.png" alt=""></li>';
		// $val .= '</ul>';
		$val .= '</div>';


		// オリジナルドキュメント
		$val .= $doc;

		// パネルコントロール
		$val .= '</div><!-- / .panelpropatycontrol-panel -->';		// パネルスワップ
		echo $val;

	}

	/**
	 * static wrapCarousel()
	 * カルーセル用の HTML タグを付加する
	 * 
	 * @param  [type]  $docs [description]
	 * @param  integer $id   [description]
	 * @return [type]        [description]
	 */
	public static function wrapCarousel($docs, $id = 0) {
		$val = '';

		if(is_array($docs)) {
			//パネルチェンジ（カルーセル）
			// $val .= '<div id="my-carousel-'.$id.'" class="carousel slide">';
			$val .= '<div id="'.$id.'" class="carousel slide">';
			$val .= '<div class="carousel-inner">';

				for($n=0; $n<count($docs); $n++) {
					$n==0 ? $active = 'active' : $active = '';
					$val .= '<div class="item '.$active.'">';
					$val .= $docs[$n];
					$val .= '</div>';
				}

			$val .= '</div><!-- / .carousel-inner -->';

			// カルーセル左ボタン
			// $val .= '<a class="left carousel-control" href="#my-carousel-'.$id.'" data-slide="prev">';
			$val .= '<a class="left carousel-control" href="#'.$id.'" data-slide="prev">';
			$val .= '<span class="glyphicon glyphicon-chevron-left"></span></a>';

			// カルーセル右ボタン
			// $val .= '<a class="right carousel-control" href="#my-carousel-'.$id.'" data-slide="next">';
			$val .= '<a class="right carousel-control" href="#'.$id.'" data-slide="next">';
			$val .= '<span class="glyphicon glyphicon-chevron-right"></span></a>';

			$val .= '</div><!-- / #my-carousel .carousel .slide -->';
		}

		return $val;
	}

	/**
	 * static wrapPills()
	 * タブパネル用の HTML タグを付加する
	 * 
	 * @param  array $docs 
	 * @return [type]       [description]
	 */
	public static function wrapPills($docs) {

		$val = '';
		if(is_array($docs)){
			$val .= '<div class="tab-content">';
			for($n=0;$n<count($docs);$n++){
				$n==0 ? $active = 'active in' : $active = '';
				$val .= '<div class="tab-pane fade '.$active.'" id="tab'.$n.'">';
					$val .= $docs[$n];
				$val .= '</div>';
			}
			$val .= '</div><!-- / .tab-content -->';
		}
		return $val;
	}
}
			// $val = '';

			// // パネルコントロール
			// $val .= '<div class="panelcontrol-panel">';

			// $val .= '<div class="panelcontrol-buttons">';
			// $val .= '<div class="container">';
			// $val .= '<div class="row">';

			// 	$val .= '<div class="col-md-2 col-sm-2 col-xs-4 text-left">';
			// 	$val .= '<button class="delete-panel-btn btn btn-danger btn-sm">パネル削除</button>';
			// 	$val .= '</div>';

			// 	$val .= '<div class="col-md-8 col-sm-8 col-xs-4 text-center">';
			// 	$val .= '<button class="panelcontrol-up btn btn-default btn-sm">▲（上下入れ替え）▼</button>';
			// 	$val .= '</div>';

			// 	$val .= '<div class="col-md-2 col-sm-2 col-xs-4 text-right">';
			// 	$val .= '<button class="add-panel-btn btn btn-default btn-sm">◀︎◀︎パネル追加</button>';
			// 	$val .= '</div>';
				
			// $val .= '</div><!-- / .row -->';
			// $val .= '</div><!-- / .container -->';
			// $val .= '</div><!-- / .panelcontrol-buttons -->';

			// // パネルコントロール（追加ボタン）
			// $val .= '<div class="panelcontrol-add" style="display: none;">';
			// $val .= '<div class="container">';
			// $val .= '<div class="row">';

			// 	$val .= '<div class="col-md-7 col-md-offset-1 col-sm-2 col-xs-4 text-left">';
			// 	$val .= '<button class="delete-panel-btn btn btn-default btn-sm">ホーム</button>';
			// 	$val .= '<button class="delete-panel-btn btn btn-default btn-sm">1列</button>';
			// 	$val .= '<button class="delete-panel-btn btn btn-default btn-sm">2列</button>';
			// 	$val .= '<button class="delete-panel-btn btn btn-default btn-sm">3列</button>';
			// 	$val .= '<button class="delete-panel-btn btn btn-default btn-sm">リンクボタン</button>';
			// 	$val .= '<button class="delete-panel-btn btn btn-default btn-sm">コンタクト</button>';
			// 	$val .= '</div>';

			// 	$val .= '<div class="col-md-1 col-md-offset-1 col-sm-2 col-xs-4 text-right">';
			// 	$val .= '<button class="add-panel-ok-btn btn btn-primary btn-sm">確定</button>';
			// 	$val .= '</div>';

			// 	$val .= '<div class="col-md-1 col-md-offset-1 col-sm-2 col-xs-4 text-right">';
			// 	$val .= '<button class="add-panel-cancel-btn btn btn-default btn-sm">キャンセル</button>';
			// 	$val .= '</div>';
				
			// $val .= '</div><!-- / .row -->';
			// $val .= '</div><!-- / .container -->';
			// $val .= '</div><!-- / .panelcontrol-add -->';

			// 	//パネルチェンジ（カルーセル）
			// 	$val .= '<div id="my-carousel-'.$count.'" class="carousel slide">';
			// 	$val .= '<div class="carousel-inner">';

			// 		for($n=0; $n<count($modules); $n++) {
			// 			$n==0 ? $active = 'active' : $active = '';
			// 			$val .= '<div class="item '.$active.'">';
			// 			$val .= $modules[$n]->getDoc();
			// 			$val .= '</div>';
			// 		}

			// 		// $val .= '<div class="item active">';
			// 		// $val .= $this->getDoc();
			// 		// $val .= '</div>';

			// 		// $val .= '<div class="item">';
			// 		// $val .= $this->getDoc();
			// 		// $val .= '</div>';

			// 		// $val .= '<div class="item">';
			// 		// 	$val .= '<img src="holder.js/900x500/auto/#777:#fff/text:Third slide" alt="">';
			// 		// $val .= '</div>';
			// 	$val .= '</div><!-- / .carousel-inner -->';

			// 	// カルーセル左ボタン
			// 	$val .= '<a class="left carousel-control" href="#my-carousel-'.$count.'" data-slide="prev">';
			// 	$val .= '<span class="glyphicon glyphicon-chevron-left"></span></a>';

			// 	// カルーセル右ボタン
			// 	$val .= '<a class="right carousel-control" href="#my-carousel-'.$count.'" data-slide="next">';
			// 	$val .= '<span class="glyphicon glyphicon-chevron-right"></span></a>';

			// 	$val .= '</div><!-- / #my-carousel .carousel .slide -->';

			// // パネルコントロール
			// $val .= '</div><!-- / .panelcontrol-panel -->';		// パネルスワップ
			// echo $val;

?>
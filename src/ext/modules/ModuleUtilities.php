<?php

class ModuleUtilities {

	public static function wrapPanelControll($doc) {
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

				$val .= '<div class="col-md-7 col-md-offset-1 col-sm-2 col-xs-4 text-left">';
				$val .= '<button class="delete-panel-btn btn btn-default btn-sm">ホーム</button>';
				$val .= '<button class="delete-panel-btn btn btn-default btn-sm">1列</button>';
				$val .= '<button class="delete-panel-btn btn btn-default btn-sm">2列</button>';
				$val .= '<button class="delete-panel-btn btn btn-default btn-sm">3列</button>';
				$val .= '<button class="delete-panel-btn btn btn-default btn-sm">リンクボタン</button>';
				$val .= '<button class="delete-panel-btn btn btn-default btn-sm">コンタクト</button>';
				$val .= '</div>';

				$val .= '<div class="col-md-1 col-md-offset-1 col-sm-2 col-xs-4 text-right">';
				$val .= '<button class="add-panel-ok-btn btn btn-primary btn-sm">確定</button>';
				$val .= '</div>';

				$val .= '<div class="col-md-1 col-md-offset-1 col-sm-2 col-xs-4 text-right">';
				$val .= '<button class="add-panel-cancel-btn btn btn-default btn-sm">キャンセル</button>';
				$val .= '</div>';
				
			$val .= '</div><!-- / .row -->';
			$val .= '</div><!-- / .container -->';
			$val .= '</div><!-- / .panelcontrol-add -->';

			// オリジナルドキュメント
			$val .= $doc;

			// パネルコントロール
			$val .= '</div><!-- / .panelcontrol-panel -->';		// パネルスワップ
			echo $val;

	}

	public static function wrapCarousel($docs) {
		$val = '';

		if(is_array($docs)) {
			//パネルチェンジ（カルーセル）
			$val .= '<div id="my-carousel-'.$count.'" class="carousel slide">';
			$val .= '<div class="carousel-inner">';

				for($n=0; $n<count($docs); $n++) {
					$n==0 ? $active = 'active' : $active = '';
					$val .= '<div class="item '.$active.'">';
					$val .= $docs[$n];
					$val .= '</div>';
				}

			$val .= '</div><!-- / .carousel-inner -->';

			// カルーセル左ボタン
			$val .= '<a class="left carousel-control" href="#my-carousel-'.$count.'" data-slide="prev">';
			$val .= '<span class="glyphicon glyphicon-chevron-left"></span></a>';

			// カルーセル右ボタン
			$val .= '<a class="right carousel-control" href="#my-carousel-'.$count.'" data-slide="next">';
			$val .= '<span class="glyphicon glyphicon-chevron-right"></span></a>';

			$val .= '</div><!-- / #my-carousel .carousel .slide -->';
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
<?php

define( "JSON_FILE_NAME", "module.json" );
define( "JSON_ID_KEY", "id" );
define( "JSON_CONTENT_KEY", "content" );
define( "JSON_CSS_KEY", "css" );

define( "CSS_SECTION", "section" );
define( "CSS_OVERLAY", "overlay" );


abstract class Module {

	protected $id = '';
	protected $path = '';
	protected $content  = array();
	protected $css = array();
	protected $doc = '';
	protected $editDoc = '';

	public $colors = array(
		"background-color" => "#0F2651",
		"color" => "#fff"
	);

	/**
	 * JSON を読み込む
	 * @param String $path モジュールディレクトリへの相対パス（最後の / 必要）
	 *                     ex: modules/home/
	 */
	function __construct( $path ) {
		if( $file = file_get_contents( $path.JSON_FILE_NAME ) ) {
			$json = json_decode( $file, true );	// true 付けると連想配列

			// ローカル変数の初期化
			$this->id = $json[JSON_ID_KEY];
			$this->content = $json[JSON_CONTENT_KEY];
			$css = $json[JSON_CSS_KEY];
			foreach( $css as $key => $val ) {
				$this->css[$key] = $this->getStyle($css[$key]);
			}
		} else {
			echo '読み込みエラー<br>';
			echo $path;
		}
	}


	/**
	 * style 要素を返す（ex. "margin:0;badding:0;"）
	 * @param  array 	$node 	[description]
	 * @return String 	$style 	[description]
	 */
	private function getStyle( $node ){
		$style = '"';
		foreach( $node as $key => $val ) {
			if( $val == '$$$') {
				$val = $this->colors[$key];
			}
			$style .= $key.":".$val.";";
		}
		$style .='"';
		return $style;
	}

	/**
	 * HTMLドキュメントを返す
	 * @return String HTML ドキュメント
	 */
	public function getDoc() {

		$preDoc = $this->getPreDoc();
		$postDoc = $this->getPostDoc();

		return $preDoc.$this->doc.$postDoc;
	}

	public function getPreDoc() {
		$val = '';
		$val .= '<section id="'.$this->id.'" style='.$this->css[CSS_SECTION].'>';
		$val .= '<div style='.$this->css[CSS_OVERLAY].'>';
		$val .= '<div class="container">';
		return $val;
	}

	public function getPostDoc() {
		$val = '';
		$val .= '</div><!-- / .container -->';
		$val .= '</div><!-- / .overlay -->';
		$val .= '</section>';
		return $val;
	}

	/**
	 * 編集タグ付きのドキュメントを返す
	 *
	 * 2015/07/07 時点でカルーセル動かない（$count が入ってないため）	※入れれば動く
	 * data-carousel-index とかを jQuery で挿入する必要あり
	 *
	 * @return String 編集タグ付きのドキュメント
	 */
	public function getEditDoc(){
		$val = '';

		// // パネルスワップ
		// $val .= '<div class="panelcontrol-panel">';
		// $val .= '<div class="panelcontrol-buttons">';

		// $val .= '<div class="container">';
		// $val .= '<div class="row">';
		// 	$val .= '<div class="
		// 				col-md-8 col-md-offset-2 
		// 				col-sm-8 col-sm-offset-2 
		// 				col-xs-8 col-xs-offset-2 text-center">';
		// 		$val .= '<button class="panelcontrol-up btn btn-default">▲（上下入れ替え）▼</button>';
		// 	$val .= '</div>';	
		
		// 	$val .= '<div class="col-md-2 col-sm-2 col-xs-2 text-right">';
		// 		$val .= '<a class="panelcontrol-add" href="hoge.php" target="_blank">';
		// 		$val .= '<i class="fa fa-plus-circle  fa-2x"></i>';
		// 		$val .= '</a>';
		// 	$val .= '</div>';
			
		// $val .= '</div><!-- / .row -->';
		// $val .= '</div><!-- / .container -->';
		// $val .= '</div><!-- / .panelcontrol-buttons -->';

		// 	// パネルカルーセル
		// 	$val .= '<div id="my-carousel-'.$count.'" class="carousel slide">';
		// 	$val .= '<div class="carousel-inner">';

		// 		$val .= '<div class="item active">';
		// 			$val .= $this->getDoc();
		// 		$val .= '</div>';

		// 		$val .= '<div class="item">';
		// 			$val .= $this->getDoc();
		// 		$val .= '</div>';

		// 		$val .= '<div class="item">';
		// 			$val .= '<img src="holder.js/900x500/auto/#777:#fff/text:Third slide" alt="">';
		// 		$val .= '</div>';
		// 	$val .= '</div><!-- / .carousel-inner -->';

		// 	// カルーセル左ボタン
		// 	$val .= '<a class="left carousel-control" href="#my-carousel-'.$count.'" data-slide="prev">';
		// 	$val .= '<span class="glyphicon glyphicon-chevron-left"></span></a>';

		// 	// カルーセル右ボタン
		// 	$val .= '<a class="right carousel-control" href="#my-carousel-'.$count.'" data-slide="next">';
		// 	$val .= '<span class="glyphicon glyphicon-chevron-right"></span></a>';

		// 	$val .= '</div><!-- / #my-carousel .carousel .slide -->';


		// // パネルスワップ
		// $val .= '</div><!-- / .panelcontrol-panel -->';


		//---------------------------


		// パネルコントロール
		$val .= '<div class="panelcontrol-panel" data-panel-index="">';
		$val .= '<div class="panelcontrol-buttons">';

		$val .= '<div class="container">';
		$val .= '<div class="row">';
			$val .= '<div class="
						col-md-8 col-md-offset-2 
						col-sm-8 col-sm-offset-2 
						col-xs-8 col-xs-offset-2 text-center">';
				$val .= '<button class="panelcontrol-up btn btn-default">▲（上下入れ替え）▼</button>';
			$val .= '</div>';	
		
			$val .= '<div class="col-md-2 col-sm-2 col-xs-2 text-right">';
				$val .= '<a class="add-panel-btn" href="hoge.php" target="_blank">';
				$val .= '<i class="fa fa-plus-circle  fa-2x"></i></a>';

				$val .= '<a class="delete-panel-btn" href="hoge.php" target="_blank">';
				$val .= '<i class="fa fa-times fa-2x"></i></a>';
			$val .= '</div>';
			
		$val .= '</div><!-- / .row -->';
		$val .= '</div><!-- / .container -->';
		$val .= '</div><!-- / .panelcontrol-buttons -->';

			// パネルチェンジ（カルーセル）
			// $val .= '<div id="my-carousel-'.$count.'" class="carousel slide">';
			// $val .= '<div class="carousel-inner">';

			// 	$val .= '<div class="item active">';
					$val .= $this->getDoc();
			// 	$val .= '</div>';

			// 	$val .= '<div class="item">';
			// 		$val .= $this->getDoc();
			// 	$val .= '</div>';

			// 	$val .= '<div class="item">';
			// 		$val .= '<img src="holder.js/900x500/auto/#777:#fff/text:Third slide" alt="">';
			// 	$val .= '</div>';
			// $val .= '</div><!-- / .carousel-inner -->';

			// // カルーセル左ボタン
			// $val .= '<a class="left carousel-control" href="#my-carousel-'.$count.'" data-slide="prev">';
			// $val .= '<span class="glyphicon glyphicon-chevron-left"></span></a>';

			// // カルーセル右ボタン
			// $val .= '<a class="right carousel-control" href="#my-carousel-'.$count.'" data-slide="next">';
			// $val .= '<span class="glyphicon glyphicon-chevron-right"></span></a>';

			// $val .= '</div><!-- / #my-carousel .carousel .slide -->';


		// パネルコントロール
		$val .= '</div><!-- / .panelcontrol-panel -->';		// パネルスワップ
		return $val;

	}

}

?>

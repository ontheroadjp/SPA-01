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

}

?>
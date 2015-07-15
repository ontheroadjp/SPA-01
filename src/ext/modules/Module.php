<?php

define( "JSON_FILE_NAME", "module.json" );
define( "JSON_ID_KEY", "id" );
define( "JSON_CONTENT_KEY", "content" );
define( "JSON_CSS_KEY", "css" );

define( "CSS_SECTION", "section" );
define( "CSS_OVERLAY", "overlay" );

require_once('ModuleUtilities.php');

abstract class Module {

	protected $id = '';
	protected $path = '';
	protected $content  = array();
	protected $css = array();
	protected $doc = '';
	protected $editDoc = '';

	public $colors = array(
		"primary-color" => "#0F2651",
		"secondary-color" => "#fff"
	);

	/**
	 * __construct()
	 * module.json を読み込んでローカル変数の初期化する
	 *
	 * @param String $path モジュールディレクトリへの相対パス（最後の / 必要）
	 *                     ex: modules/home/
	 */
	function __construct( $path ) {
		if( $file = file_get_contents( $path.JSON_FILE_NAME ) ) {
			$json = json_decode( $file, true );	// true 付けると連想配列

			// ローカル変数の初期化
			// $this->id = $json[JSON_ID_KEY];
			$this->id = mt_rand();
			$this->content = $json[JSON_CONTENT_KEY];
			$csstemp = $json[JSON_CSS_KEY];
			foreach( $csstemp as $key => $val ) {
				$this->css[$key] = $this->getStyle($csstemp[$key]);
			}
		} else {
			echo '読み込みエラー<br>';
			echo $path;
		}
	}


	/**
	 * getStyle()
	 * 初期化用メソッド - style 要素を返す（ex. "margin:0;badding:0;"）
	 *
	 * @param  array 	$node 	[description]
	 * @return String 	$style 	返値フォーマット（"color:#fff;background:#000;"）
	 */
	private function getStyle( $node ){
		$style = '"';
		foreach( $node as $key => $val ) {
			if( $val == '$$primary-color$$') {
				$val = $this->colors['primary-color'];
			} else if( $val == '$$secondary-color$$' ) {
				$val = $this->colors['secondary-color'];
			}
			$style .= $key.":".$val.";";
		}
		$style .='"';
		return $style;
	}

	/**
	 * getDoc()
	 * HTMLドキュメントを返す
	 *
	 * @return String HTML ドキュメント
	 */
	public function getDoc() {

		$val = '';
		$val .= '<section id="'.$this->id.'" style='.$this->css[CSS_SECTION].'>';
		$val .= '<div style='.$this->css[CSS_OVERLAY].'>';
		$val .= '<div class="container">';
		$val .= $this->doc;
		$val .= '</div><!-- / .container -->';
		$val .= '</div><!-- / .overlay -->';
		$val .= '</section>';

		return $val;
	}

	/**
	 * getEditDoc()
	 * パネルコントロールタグ付きのドキュメントを返す
	 *
	 * @return String 編集タグ付きのドキュメント
	 */
	public function getEditDoc( $carousel = null ){
		return ModuleUtilities::wrapPanelControll($this->getDoc());

	}

}

?>

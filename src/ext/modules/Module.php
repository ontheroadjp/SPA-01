<?php

define( "JSON_FILE_NAME", "module.json" );
define( "JSON_CONTENT_KEY", "content" );

abstract class Module {

	protected $content  = array();
	protected $doc = '';

	/**
	 * JSON を読み込む
	 * @param String $path モジュールディレクトリへの相対パス（最後の / 必要）
	 *                     ex: modules/home/
	 */
	function __construct( $path ) {
		if( $file = file_get_contents( $path.JSON_FILE_NAME ) ) {
			$json = json_decode( $file, true );	// true 付けると連想配列
			$this->content = $json[JSON_CONTENT_KEY];			
		} else {
			echo '読み込みエラー<br>';
			echo $path;
		}
	}


	/**
	 * HTMLドキュメントを返す
	 * @return String HTML ドキュメント
	 */
	public function getDoc() {
		return $this->doc;
	}
}

?>
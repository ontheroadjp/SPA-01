<?php

abstract class Module {

	protected $content  = array();
	protected $doc = '';

	function __construct( $path ) {
		if( $file = file_get_contents( $path.'module.json' ) ) {
			$json = json_decode( $file, true );	// true 付けると連想配列
			$this->content = $json['content'];			
		} else {
			echo '読み込みエラー<br>';
			echo $path;
		}
	}

	public function getDoc() {
		return $this->doc;
	}
}

?>
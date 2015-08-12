
<?php
define( "JSON_ID_KEY", "id" );
define( "JSON_MODULE_PATH_KEY", "path" );
define( "JSON_BASENAME_KEY", "basename" );

public class ModuleManager {

	function  __construct(){
		if( $file = file_get_contents( "./modules.json" ) ) {

		}

	}

	static function create( $json ) {

		$json = json_decode( $file, true );		// true 付けると連想配列

		$id = $json[JSON_ID_KEY];
		$modulepath = $json[JSON_MODULE_PATH_KEY];
		$basename = $json[JSON_BASENAME_KEY];

		require_once( $modulepath.$basename );
		$module = new $basename( $modulepath );

	}
}

?>
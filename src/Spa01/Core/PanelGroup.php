<?php

// namespace SPA01\Core;

// define('HOME', 'home');
// define('ONE_COLUMN', '1column');
// define('TWO_COLUMNS', '2columns');
// define('THREE_COLUMNS', '3columns');
// define('LOCATION', 'location');

require_once('ModuleManager.php');

class PanelGroup extends ModuleManager {
	function __construct(array $array) {
		parent::setModuleMap( $array );
	}
}


?>


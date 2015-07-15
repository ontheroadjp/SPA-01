

<?php

define('HOME', 'home');
define('ONE_COLUMN', '1column');
define('TWO_COLUMNS', '2columns');
define('THREE_COLUMNS', '3columns');
define('LOCATION', 'location');

require_once('ModuleManager.php');

class PanelGroup extends ModuleManager {
	// private $panelGroup = array(
	// 	HOME => array(
	// 		'Home01'	=> 'modules/home/01/module.json'
	// 	),
	// 	ONE_COLUMN => array(
	// 		'H2p'		=> 'modules/1column/h2p/module.json'

	// 	),
	// 	TWO_COLUMNS => array(
	// 		'TxtImg'	=> 'modules/2columns/txtimg/module.json',
	// 		'ImgTxt'	=> 'modules/2columns/imgtxt/module.json',
	// 	),
	// 	THREE_COLUMNS => array(
	// 		'HeaderIcon'=> 'modules/3columns/headericon/module.json',
	// 		'Parallax01'=> 'modules/3columns/parallax01/module.json'

	// 	),
	// 	LOCATION => array(
	// 		'Location01'		=> 'modules/location/01/module.json',
	// 		'Location02'		=> 'modules/location/02/module.json'

	// 	)

	// );

	// function __construct() {
	// 	// $this->localPath = SITEMAP_FILE_NAME;
	// 	$this->initModules( $this->panelGroup[TWO_COLUMNS] );
	// }

	function __construct(array $array) {
		if(is_array($array)) {
			$this->initModules( $array );
		} else {
			echo '引数が array じゃない';
		}
	}

	protected function initModules( array $modules = null) {
		parent::initModules($modules);
	}
}


?>

